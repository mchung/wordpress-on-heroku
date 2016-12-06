var ET_PageBuilder = ET_PageBuilder || {};

( function($) {

	$( document ).ready( function() {

		// Models

		ET_PageBuilder.Module = Backbone.Model.extend( {

			defaults: {
				type : 'element'
			}

		} );

		// helper module
		ET_PageBuilder.Layout = Backbone.Model.extend( {

			defaults: {
				moduleNumber : 0,
				forceRemove : false,
				modules : [
					{
						'title' : 'Image',
						'label' : 'et_pb_image'
					},
					{
						'title' : 'Text',
						'label' : 'et_pb_text'
					},
					{
						'title' : 'Blurb',
						'label' : 'et_pb_blurb'
					},
					{
						'title' : 'Tabs',
						'label' : 'et_pb_tabs'
					},
					{
						'title' : 'Slider',
						'label' : 'et_pb_slider'
					},
					{
						'title' : 'Testimonial',
						'label' : 'et_pb_testimonial'
					},
					{
						'title' : 'Pricing Table',
						'label' : 'et_pb_pricing_tables'
					},
					{
						'title' : 'Call To Action',
						'label' : 'et_pb_cta'
					},
					{
						'title' : 'Subscribe',
						'label' : 'et_pb_signup'
					},
					{
						'title' : 'Portfolio',
						'label' : 'et_pb_portfolio'
					},
					{
						'title' : 'Animated Counters',
						'label' : 'et_pb_counters'
					},
					{
						'title' : 'Fullwidth Header',
						'label' : 'et_pb_fullwidth_header',
						'fullwidth_only' : 'on'
					},
					{
						'title' : 'Fullwidth Slider',
						'label' : 'et_pb_fullwidth_slider',
						'fullwidth_only' : 'on'
					},
					{
						'title' : 'Toggle',
						'label' : 'et_pb_toggle'
					},
					{
						'title' : 'Contact Form',
						'label' : 'et_pb_contact_form'
					},
					{
						'title' : 'Sidebar',
						'label' : 'et_pb_sidebar'
					},
					{
						'title' : 'Divider',
						'label' : 'et_pb_divider'
					},
					{
						'title' : 'Blog',
						'label' : 'et_pb_blog'
					},
					{
						'title' : 'Shop',
						'label' : 'et_pb_shop'
					}
				],
				views : [
				]
			},

			addView : function( module_cid, view ) {
				var views = this.get( 'views' );

				views[module_cid] = view;
				this.set( { 'views' : views } );
			},

			getView : function( cid ) {
				return this.get( 'views' )[cid];
			},

			getChildViews : function( parent_id ) {
				var views = this.get( 'views' ),
					child_views = {};

				_.each( views, function( view, key ) {
					if ( view['model']['attributes']['parent'] === parent_id )
						child_views[key] = view;
				} );

				return child_views;
			},

			setNewParentID : function( cid, new_parent_id ) {
				var views = this.get( 'views' );

				views[cid]['model']['attributes']['parent'] = new_parent_id;

				this.set( { 'views' : views } );
			},

			removeView : function( cid ) {
				var views = this.get( 'views' ),
					new_views = {};

				_.each( views, function( value, key ) {
					if ( key != cid )
						new_views[key] = value;
				} );

				this.set( { 'views' : new_views } );
			},

			generateNewId : function() {
				var moduleNumber = this.get( 'moduleNumber' ) + 1;

				this.set( { 'moduleNumber' : moduleNumber } );

				return moduleNumber;
			},

			generateTemplateName : function( name ) {
				return '#et-builder-' + name + '-module-template';
			},

			getModuleOptionsNames : function( module_type ) {
				var modules = this.get('modules');

				return this.addAdminLabel( _.findWhere( modules, { label : module_type } )['options'] );
			},

			getNumberOf : function( element_name, module_cid ) {
				var views = this.get( 'views' ),
					num = 0;

				_.each( views, function( view ) {
					if ( view['model']['attributes']['parent'] === module_cid && view['model']['attributes']['type'] === element_name )
						num++;
				} );

				return num;
			},

			getNumberOfModules : function( module_name ) {
				var views = this.get( 'views' ),
					num = 0;

				_.each( views, function( view ) {
					if ( view['model']['attributes']['type'] === module_name )
						num++;
				} );

				return num;
			},

			getTitleByShortcodeTag : function ( tag ) {
				var modules = this.get('modules');

				return _.findWhere( modules, { label : tag } )['title'];
			},

			isModuleFullwidth : function ( module_type ) {
				var modules = this.get('modules');

				return 'on' === _.findWhere( modules, { label : module_type } )['fullwidth_only'] ? true : false;
			},

			addAdminLabel : function ( optionsNames ) {
				return _.union( optionsNames, ['admin_label'] );
			}

		} );


		// Collections

		ET_PageBuilder.Modules = Backbone.Collection.extend( {

			model : ET_PageBuilder.Module

		} );


		//Views

		ET_PageBuilder.SectionView = Backbone.View.extend( {

			className : 'et_pb_section',

			template : _.template( $('#et-builder-section-template').html() ),

			events: {
				'click .et-pb-settings-section' : 'showSettings',
				'click .et-pb-remove' : 'removeSection',
				'click .et-pb-section-add-main' : 'addSection',
				'click .et-pb-section-add-fullwidth' : 'addFullwidthSection'
			},

			initialize : function() {
				this.child_views = [];
			},

			render : function() {
				this.$el.html( this.template( this.model.toJSON() ) );

				this.makeRowsSortable();

				return this;
			},

			showSettings : function( event ) {
				var modal_view,
					view_settings = {
						model : this.model,
						collection : this.collection,
						attributes : {
							'data-open_view' : 'module_settings'
						}
					};

				event.preventDefault();

				// TODO: refactor the code, it's copied from the AppView's addModule function
				modal_view = new ET_PageBuilder.ModalView( view_settings );
				$('body').append( modal_view.render().el );
			},

			addSection : function( event ) {
				var module_id = ET_PageBuilder_Layout.generateNewId();

				event.preventDefault();

				this.collection.add( [ {
					type : 'section',
					module_type : 'section',
					et_pb_fullwidth : 'off',
					cid : module_id,
					view : this,
					created : 'auto'
				} ], { update_shortcodes : 'false' } );
			},

			addFullwidthSection : function( event ) {
				var module_id = ET_PageBuilder_Layout.generateNewId();

				event.preventDefault();

				this.collection.add( [ {
					type : 'section',
					module_type : 'section',
					et_pb_fullwidth : 'on',
					cid : module_id,
					view : this,
					created : 'auto'
				} ] );
			},

			addRow : function( appendAfter ) {
				var module_id = ET_PageBuilder_Layout.generateNewId();

				this.collection.add( [ {
					type : 'row',
					module_type : 'row',
					cid : module_id,
					parent : this.model.get( 'cid' ),
					view : this,
					appendAfter : appendAfter
				} ] );
			},

			makeRowsSortable : function() {
				var this_el = this,
					sortable_el = this_el.model.get( 'et_pb_fullwidth' ) !== 'on'
						? '.et-pb-section-content'
						: '.et_pb_fullwidth_sortable_area';

				this_el.$el.find( sortable_el ).sortable( {
					connectWith: sortable_el,
					cancel : '.et-pb-settings, .et-pb-remove, .et-pb-row-add, .et-pb-insert-module, .et-pb-insert-column',
					update : function( event, ui ) {
						if ( ! $( event.srcElement ).closest( event.target ).length ) {

							// don't allow to move the row to another section if the section has only one row
							if ( ! $( event.target ).find( '.et_pb_row' ).length ) {
								$(this).sortable( 'cancel' );
								alert( et_pb_options.section_only_row_dragged_away );
							}

							// makes sure the code runs one time, if row is dragged into another section
							return;

						}

						ET_PageBuilder_Layout.setNewParentID( ui.item.find( '.et-pb-row-content' ).data( 'cid' ), this_el.model.attributes.cid );

						ET_PageBuilder_Events.trigger( 'et-sortable:update' );
					}
				} );
			},

			addChildView : function( view ) {
				this.child_views.push( view );
			},

			removeChildViews : function() {
				_.each( this.child_views, function( view ) {
					if ( typeof view.model !== 'undefined' )
						view.model.destroy();

					view.remove();
				} );
			},

			removeSection : function( event ) {
				var rows;

				if ( event ) event.preventDefault();

				if ( this.model.get( 'et_pb_fullwidth' ) === 'on' ) {
					this.removeChildViews();
				} else {
					rows = ET_PageBuilder_Layout.getChildViews( this.model.get('cid') );

					_.each( rows, function( row ) {
						row.removeRow();
					} );
				}

				// if there is only one section, don't remove it
				// allow to remove all sections if removeSection function is called directly
				if ( ET_PageBuilder_Layout.get( 'forceRemove' ) || ET_PageBuilder_Layout.getNumberOfModules( 'section' ) > 1 ) {
					this.model.destroy();

					ET_PageBuilder_Layout.removeView( this.model.get('cid') );

					this.remove();
				}

				// trigger remove event if the row was removed manually ( using a button )
				if ( event )
					ET_PageBuilder_Events.trigger( 'et-module:removed' );
			}
		} );

		ET_PageBuilder.RowView = Backbone.View.extend( {
			className : 'et_pb_row',

			template : _.template( $('#et-builder-row-template').html() ),

			events : {
				'click .et-pb-insert-column' : 'displayColumnsOptions',
				'click .et-pb-row-add' : 'addNewRow',
				'click .et-pb-remove' : 'removeRow'
			},

			initialize : function() {
				this.listenTo( ET_PageBuilder_Events, 'et-add:columns', this.toggleInsertColumnButton );
			},

			render : function() {
				this.$el.html( this.template( this.model.toJSON() ) );

				return this;
			},

			displayColumnsOptions : function( event ) {
				event.preventDefault();

				var view,
					this_view = this;

				view = new ET_PageBuilder.ModalView( {
					model : this.model,
					collection : this.collection,
					attributes : {
						'data-open_view' : 'column_settings'
					},
					// TODO: decide if we need to pass the whole view or just $el
					view : this_view
				} );

				$('body').append( view.render().el );

				this.toggleInsertColumnButton();
			},

			toggleInsertColumnButton : function() {
				var model_id = this.model.get( 'cid' ),
					columnsInRow;

				// check if the current row has at least one column
				columnsInRow = this.collection.find( function( model ) {
					return model.get( 'type' ) === 'column' && model.get( 'parent' ) === model_id;
				} );

				if ( ! _.isUndefined( columnsInRow ) )
					this.$( '.et-pb-insert-column' ).hide();
			},

			addNewRow : function( event ) {
				var $parent_section = this.$el.closest( '.et-pb-section-content' ),
					parent_view_cid = $parent_section.data( 'cid' ),
					parent_view = ET_PageBuilder_Layout.getView( parent_view_cid );

				parent_view.addRow( this.$el );

				event.preventDefault();
			},

			removeRow : function( event, force ) {
				var columns;

				if ( event ) event.preventDefault();

				columns = ET_PageBuilder_Layout.getChildViews( this.model.get('cid') );

				_.each( columns, function( column ) {
					column.removeColumn();
				} );

				// if there is only one row in the section, don't remove it
				if ( ET_PageBuilder_Layout.get( 'forceRemove' ) || ET_PageBuilder_Layout.getNumberOf( 'row', this.model.get('parent') ) > 1 ) {
					this.model.destroy();

					ET_PageBuilder_Layout.removeView( this.model.get('cid') );

					this.remove();
				} else {
					this.$( '.et-pb-insert-column' ).show();
				}

				// trigger remove event if the row was removed manually ( using a button )
				if ( event )
					ET_PageBuilder_Events.trigger( 'et-module:removed' );
			}
		} );

		ET_PageBuilder.ModalView = Backbone.View.extend( {

			className : 'et_pb_modal_settings_container',

			template : _.template( $('#et-builder-modal-template').html() ),

			events : {
				'click .et-pb-modal-save' : 'saveSettings',
				'click .et-pb-modal-close' : 'closeModal'
			},

			initialize : function( attributes ) {
				this.listenTo( ET_PageBuilder_Events, 'et-add:columns', this.removeView );

				// listen to module settings box that is created after the user selects new module to add
				this.listenTo( ET_PageBuilder_Events, 'et-new_module:show_settings', this.removeView );

				this.listenTo( ET_PageBuilder_Events, 'et-saved_layout:loaded', this.removeView );

				this.options = attributes;
			},

			render : function() {
				var view,
					view_settings = {
						model : this.model,
						collection : this.collection,
						view : this.options.view
					},
					fake_value = false;

				if ( this.attributes['data-open_view'] === 'all_modules' && this.model.get( 'module_type' ) === 'section' && this.model.get( 'et_pb_fullwidth' ) === 'on' ) {
					this.model.set( 'type', 'column', { silent : true } );
					fake_value = true;
				}

				if ( typeof this.model !== 'undefined' )
					this.$el.html( this.template( this.model.toJSON() ) );
				else
					this.$el.html( this.template() );

				if ( fake_value )
					this.model.set( 'type', 'section', { silent : true } );

				this.container = this.$('.et-pb-modal-container');

				if ( this.attributes['data-open_view'] === 'column_settings' ) {
					view = new ET_PageBuilder.ColumnSettingsView( view_settings );
				} else if ( this.attributes['data-open_view'] === 'all_modules' ) {
					view_settings['attributes'] = {
						'data-parent_cid' : this.model.get( 'cid' )
					}

					view = new ET_PageBuilder.ModulesView( view_settings );
				} else if ( this.attributes['data-open_view'] === 'module_settings' ) {
					view_settings['attributes'] = {
						'data-module_type' : this.model.get( 'module_type' )
					}

					view_settings['view'] = this;

					view = new ET_PageBuilder.ModuleSettingsView( view_settings );
				} else if ( this.attributes['data-open_view'] === 'save_layout' ) {
					view = new ET_PageBuilder.SaveLayoutSettingsView( view_settings );
				}

				this.container.append( view.render().el );

				// show only modules that the current element can contain
				if ( this.attributes['data-open_view'] === 'all_modules' ) {
					if ( this.model.get( 'module_type' ) === 'section' && typeof( this.model.get( 'et_pb_fullwidth' ) !== 'undefined' ) && this.model.get( 'et_pb_fullwidth' ) === 'on' ) {
						$( view.render().el ).find( 'li' ).hide().end().find( '.et_pb_fullwidth_only_module' ).show();
					} else {
						$( view.render().el ).find( '.et_pb_fullwidth_only_module' ).hide();
					}
				}

				if ( $( '.et_pb_modal_overlay' ).length ) {
					$( '.et_pb_modal_overlay' ).remove();
					$body.removeClass( 'et_pb_stop_scroll' );
				}

				$( 'body' ).addClass( 'et_pb_stop_scroll' ).append( '<div class="et_pb_modal_overlay"></div>' );

				return this;
			},

			closeModal : function( event ) {
				event.preventDefault();

				this.removeOverlay();

				if ( typeof this.model !== 'undefined' && this.model.get( 'type' ) === 'module' && this.$( '#et_pb_content_new' ).length )
					et_pb_tinymce_remove_control( 'et_pb_content_new' );

				this.remove();

				ET_PageBuilder_Events.trigger( 'et-modal-view-removed' );
			},

			removeView : function() {
				this.removeOverlay();

				if ( typeof this.model === 'undefined' || ( this.model.get( 'type' ) === 'row' || this.model.get( 'type' ) === 'column' || ( this.model.get( 'type' ) === 'section' && this.model.get( 'et_pb_fullwidth' ) === 'on' ) ) )
					this.remove();
			},

			saveSettings : function( event ) {
				var attributes = {};

				event.preventDefault();

				this.$( 'input, select, textarea' ).each( function() {
					var $this_el = $(this),
						setting_value,
						checked_values = [],
						name = $this_el.is('#et_pb_content_main') ? 'et_pb_content_new' : $this_el.attr('id');

					if ( $this_el.is( ':checkbox' ) )
						name = $this_el.attr('name');

					if ( $this_el.is( ':checkbox' ) && typeof attributes[name] !== 'undefined' )
						return true;

					if ( $this_el.is( ':checkbox' ) && typeof attributes[name] === 'undefined' ) {
						$this_el.closest( '.et-pb-option-container' ).find( '[name="' + name + '"]:checked' ).each( function() {
							checked_values.push( $(this).val() );
						} );

						setting_value = checked_values.join( "," );
					} else if ( ! $this_el.is( ':checkbox' ) ) {
						setting_value = $this_el.is('textarea#et_pb_content_new')
							? et_pb_get_content( 'et_pb_content_new' )
							: $this_el.val();
					}

					attributes[name] = setting_value;
				} );

				this.model.set( attributes );

				et_pb_tinymce_remove_control( 'et_pb_content_new' );

				this.remove();

				ET_PageBuilder_Events.trigger( 'et-modal-view-removed' );

				this.removeOverlay();
			},

			removeOverlay : function() {
				if ( $( '.et_pb_modal_overlay' ).length ) {
					$( '.et_pb_modal_overlay' ).remove();

					$( 'body' ).removeClass( 'et_pb_stop_scroll' );
				}
			}

		} );

		ET_PageBuilder.ColumnView = Backbone.View.extend( {
			template : _.template( $('#et-builder-column-template').html() ),

			events : {
				'click .et-pb-insert-module' : 'addModule'
			},

			initialize : function() {
				this.$el.attr( 'data-cid', this.model.get( 'cid' ) );
			},

			render : function() {
				var this_el = this,
					is_fullwidth_section = this.model.get( 'module_type' ) === 'section' && this.model.get( 'et_pb_fullwidth' ) === 'on';

				this.$el.html( this.template( this.model.toJSON() ) );

				if ( is_fullwidth_section )
					this.$el.addClass( 'et_pb_fullwidth_sortable_area' );

				this.$el.sortable( {
					cancel : '.et-pb-settings, .et-pb-remove, .et-pb-insert-module, .et-pb-insert-column',
					connectWith: ( ! is_fullwidth_section ? ".et-pb-column" : ".et_pb_fullwidth_sortable_area" ),
					items : '.et_pb_module_block',
					update : function( event, ui ) {
						var model,
							$module_block;

						$module_block = ! $( event.srcElement ).is( '.et_pb_module_block' )
							? $( event.srcElement ).closest( '.et_pb_module_block' )
							: $( event.srcElement );

						// if the column doesn't have modules, add the dragged module before 'Insert Module' button
						if ( $( event.srcElement ).closest( event.target ).length && $( event.target ).find( '.et_pb_module_block' ).length === 1 ) {
							$module_block.insertBefore( $( event.target ).find( '.et-pb-insert-module' ) );
						}

						model = this_el.collection.find( function( model ) {
							return model.get('cid') == ui.item.data( 'cid' );
						} );

						if ( model.get( 'parent' ) === this_el.model.attributes.cid && $( event.srcElement ).closest( event.target ).length ) {
							// order of items have been changed within the same row

							ET_PageBuilder_Events.trigger( 'et-model-changed-position-within-column' );
						} else {
							model.set( 'parent', this_el.model.attributes.cid );
						}
					}
				} );

				return this;
			},

			addModule : function( event ) {
				event.preventDefault();

				var view;

				view = new ET_PageBuilder.ModalView( {
					model : this.model,
					collection : this.collection,
					attributes : {
						'data-open_view' : 'all_modules'
					},
					view : this
				} );

				$('body').append( view.render().el );
			},

			removeColumn : function() {
				var modules;

				modules = ET_PageBuilder_Layout.getChildViews( this.model.get('cid') );

				_.each( modules, function( module ) {
					module.removeModule();
				} );

				ET_PageBuilder_Layout.removeView( this.model.get('cid') );

				this.model.destroy();

				this.remove();
			}
		} );

		ET_PageBuilder.ColumnSettingsView = Backbone.View.extend( {

			className : 'et_pb_modal_settings',

			template : _.template( $('#et-builder-column-settings-template').html() ),

			events : {
				'click .et-pb-column-layouts li' : 'addColumns'
			},

			initialize : function( attributes ) {
				this.listenTo( ET_PageBuilder_Events, 'et-add:columns', this.removeView );

				this.listenTo( ET_PageBuilder_Events, 'et-modal-view-removed', this.remove );

				this.options = attributes;
			},

			render : function() {
				this.$el.html( this.template( ET_PageBuilder_Layout.toJSON() ) );

				return this;
			},

			addColumns : function( event ) {
				event.preventDefault();

				var that = this,
					$layout_el = $(event.target).is( 'li' ) ? $(event.target) : $(event.target).closest( 'li' ),
					layout = $layout_el.data('layout').split(','),
					layout_elements_num = _.size( layout ),
					this_view = this.options.view;

				_.each( layout, function( element, index ) {
					var update_content = layout_elements_num == ( index + 1 )
						? 'true'
						: 'false';

					that.collection.add( [ {
						type : 'column',
						cid : ET_PageBuilder_Layout.generateNewId(),
						parent : that.model.get( 'cid' ),
						layout : element,
						view : this_view
					} ], { update_shortcodes : update_content } );
				} );

				ET_PageBuilder_Events.trigger( 'et-add:columns' );
			},

			removeView : function() {
				this.remove();
			}

		} );

		ET_PageBuilder.SaveLayoutSettingsView = Backbone.View.extend( {

			className : 'et_pb_modal_settings',

			template : _.template( $('#et-builder-load_layout-template').html() ),

			events : {
				'click .et_pb_layout_button_load' : 'loadLayout',
				'click .et_pb_layout_button_delete' : 'deleteLayout'
			},

			initialize : function( attributes ) {
				this.options = attributes;

				this.layoutIsLoading = false;

				this.listenTo( ET_PageBuilder_Events, 'et-modal-view-removed', this.remove );
			},

			render : function() {
				var $this_el = this.$el;

				$this_el.html( this.template() );

				$.ajax( {
					type: "POST",
					url: et_pb_options.ajaxurl,
					data:
					{
						action : 'et_pb_show_all_layouts',
						et_load_nonce : et_pb_options.et_load_nonce
					},
					beforeSend : function() {
						ET_PageBuilder_Events.trigger( 'et-pb-loading:started' );
					},
					complete : function() {
						ET_PageBuilder_Events.trigger( 'et-pb-loading:ended' );
					},
					success: function( data ){
						$this_el.find( '.et-pb-main-settings' ).append( data );
					}
				} );

				return this;
			},

			deleteLayout : function( event ) {
				event.preventDefault();

				var $layout = $( event.currentTarget ).closest( 'li' );

				if ( $layout.hasClass( 'et_pb_deleting_layout' ) )
					return;
				else
					$layout.addClass( 'et_pb_deleting_layout' );

				$.ajax( {
					type: "POST",
					url: et_pb_options.ajaxurl,
					data:
					{
						action : 'et_pb_delete_layout',
						et_load_nonce : et_pb_options.et_load_nonce,
						et_layout_id : $layout.data( 'layout_id' )
					},
					beforeSend : function() {
						ET_PageBuilder_Events.trigger( 'et-pb-loading:started' );

						$layout.css( 'opacity', '0.5' );
					},
					complete : function() {
						ET_PageBuilder_Events.trigger( 'et-pb-loading:ended' );
					},
					success: function( data ){
						if ( $layout.closest( 'ul' ).find( '> li' ).length == 1 )
							$layout.closest( 'ul' ).prev( 'h3' ).hide();

						$layout.remove();
					}
				} );
			},

			loadLayout : function( event ) {
				event.preventDefault();

				if ( this.layoutIsLoading ) {
					return;
				} else {
					this.layoutIsLoading = true;

					this.$el.find( '.et-pb-main-settings' ).css( { 'opacity' : '0.5' } );
				}

				var $layout = $( event.currentTarget ).closest( 'li' ),
					replace_content = $layout.closest( '.et-pb-main-settings' ).find( '#et_pb_load_layout_replace' ).is( ':checked' ),
					content = et_pb_get_content( 'content' ),
					this_el = this;

				$.ajax( {
					type: "POST",
					url: et_pb_options.ajaxurl,
					data:
					{
						action : 'et_pb_load_layout',
						et_load_nonce : et_pb_options.et_load_nonce,
						et_layout_id : $layout.data( 'layout_id' ),
						et_replace_content : ( replace_content ? 'on' : 'off' )
					},
					beforeSend : function() {
						ET_PageBuilder_Events.trigger( 'et-pb-loading:started' );
					},
					complete : function() {
						ET_PageBuilder_Events.trigger( 'et-pb-loading:ended' );

						this_el.remove();

						ET_PageBuilder_Events.trigger( 'et-saved_layout:loaded' );
					},
					success: function( data ){
						content = replace_content ? data : data + content;

						ET_PageBuilder_App.removeAllSections();

						ET_PageBuilder_App.createNewLayout( content );
					}
				} );
			}

		} );

		ET_PageBuilder.ModulesView = Backbone.View.extend( {

			className : 'et_pb_modal_settings',

			template : _.template( $('#et-builder-modules-template').html() ),

			events : {
				'click .et-pb-all-modules li' : 'addModule'
			},

			initialize : function( attributes ) {
				this.options = attributes;

				this.listenTo( ET_PageBuilder_Events, 'et-modal-view-removed', this.remove );
			},

			render : function() {
				this.$el.html( this.template( ET_PageBuilder_Layout.toJSON() ) );

				return this;
			},

			addModule : function( event ) {
				var $this_el = $( event.currentTarget ),
					label    = $this_el.find( '.et_module_title' ).text(),
					type     = $this_el.attr( 'class' ).replace( ' et_pb_fullwidth_only_module', '' );

				event.preventDefault();

				this.collection.add( [ {
					type : 'module',
					cid : ET_PageBuilder_Layout.generateNewId(),
					module_type : type,
					admin_label : label,
					parent : this.attributes['data-parent_cid'],
					view : this.options.view
				} ] );

				this.remove();
			}

		} );

		ET_PageBuilder.ModuleSettingsView = Backbone.View.extend( {

			className : 'et_pb_module_settings',

			initialize : function() {
				this.template = _.template( $( ET_PageBuilder_Layout.generateTemplateName( this.attributes['data-module_type'] ) ).html() );

				this.listenTo( ET_PageBuilder_Events, 'et-modal-view-removed', this.removeModule );
			},

			events : {
			},

			render : function() {
				var $this_el = this.$el,
					content = '',
					$content_textarea,
					$content_textarea_container,
					$content_textarea_option,
					advanced_mode = false,
					view,
					$color_picker,
					$upload_button;

				this.$el.html( this.template( this.model.attributes ) );

				$content_textarea = this.$el.find( '#et_pb_content_new' );

				$color_picker = this.$el.find('.et-pb-color-picker-hex');

				$upload_button = this.$el.find('.et-pb-upload-button');

				if ( $color_picker.length ) {
					$color_picker.wpColorPicker();
				}

				if ( $upload_button.length ) {
					et_pb_activate_upload( $upload_button );
				}

				if ( $content_textarea.length ) {
					$content_textarea_option = $content_textarea.closest( '.et-pb-option' );

					if ( $content_textarea_option.hasClass( 'et-pb-option-advanced-module' ) )
						advanced_mode = true;

					if ( ! advanced_mode ) {
						$content_textarea_container = $content_textarea.closest( '.et-pb-option-container' );

						content = $content_textarea.val();

						$content_textarea.remove();

						$content_textarea_container.prepend( et_pb_content_html );

						setTimeout( function() {
							if ( typeof window.switchEditors !== 'undefined' )
								window.switchEditors.go('et_pb_content_new', 'tmce');

							et_pb_set_content( 'et_pb_content_new', content );
						}, 100 );
					} else {
						var view_cid = ET_PageBuilder_Layout.generateNewId();

						$content_textarea_option.hide();

						$content_textarea.attr( 'id', 'et_pb_content_main' );

						view = new ET_PageBuilder.AdvancedModuleSettingsView( {
							model : this,
							el : this.$el.find( '.et-pb-option-advanced-module-settings' ),
							attributes : {
								cid : view_cid
							}
						} );

						ET_PageBuilder_Layout.addView( view_cid, view );

						$content_textarea_option.before( view.render() );

						if ( $content_textarea.val() !== '' ) {
							view.generateAdvancedSortableItems( $content_textarea.val(), this.$el.find( '.et-pb-option-advanced-module-settings' ).data( 'module_type' ) );
						}
					}
				}

				setTimeout( function() {
					$this_el.find('select, input, textarea, radio').filter(':eq(0)').focus();
				}, 1 );

				return this;
			},

			removeModule : function() {
				// remove Module settings, when modal window is closed or saved

				this.remove();
			}

		} );

		ET_PageBuilder.AdvancedModuleSettingsView = Backbone.View.extend( {
			initialize : function() {
				this.listenTo( ET_PageBuilder_Events, 'et-advanced-module:updated', this.generateContent );

				this.listenTo( ET_PageBuilder_Events, 'et-modal-view-removed', this.removeModule );

				this.module_type = this.$el.data( 'module_type' );

				this.child_views = [];

				this.$el.attr( 'data-cid', this.attributes['cid'] );

				this.$sortable_options = this.$el.find('.et-pb-sortable-options');

				this.$content_textarea = this.$el.siblings('.et-pb-option-main-content').find('#et_pb_content_main');

				this.$sortable_options.sortable( {
					axis : 'y',
					cancel : '.et-pb-advanced-setting-remove, .et-pb-advanced-setting-options',
					update : function( event, ui ) {
						ET_PageBuilder_Events.trigger( 'et-advanced-module:updated' );
					}
				} );

				this.$add_sortable_item = this.$el.find( '.et-pb-add-sortable-option' ).addClass( 'et-pb-add-sortable-initial' );
			},

			events : {
				'click .et-pb-add-sortable-option' : 'addModule'
			},

			render : function() {
				return this;
			},

			addModule : function( event ) {
				event.preventDefault();

				this.model.collection.add( [ {
					type : 'module',
					module_type : this.module_type,
					cid : ET_PageBuilder_Layout.generateNewId(),
					view : this,
					created : 'manually',
					mode : 'advanced',
					parent : this.attributes['cid']
				} ], { update_shortcodes : 'false' } );

				this.$add_sortable_item.removeClass( 'et-pb-add-sortable-initial' );
			},

			generateContent : function() {
				var content = '';

				this.$sortable_options.find( 'li' ).each( function() {
					var $this_el = $(this);

					content += ET_PageBuilder_App.generateModuleShortcode( $this_el, false );
				} );

				this.$content_textarea.val( content );

				if ( ! this.$sortable_options.find( 'li' ).length )
					this.$add_sortable_item.addClass( 'et-pb-add-sortable-initial' );
				else
					this.$add_sortable_item.removeClass( 'et-pb-add-sortable-initial' );
			},

			generateAdvancedSortableItems : function( content, module_type ) {
				var this_el = this,
					et_pb_shortcodes_tags = 'et_pb_tab|et_pb_slide|et_pb_pricing_table|et_pb_counter',
					reg_exp = window.wp.shortcode.regexp( et_pb_shortcodes_tags ),
					inner_reg_exp = ET_PageBuilder_App.wp_regexp_not_global( et_pb_shortcodes_tags ),
					matches = content.match( reg_exp );

				if ( content !== '' )
					this.$add_sortable_item.removeClass( 'et-pb-add-sortable-initial' );

				_.each( matches, function ( shortcode ) {
					var shortcode_element = shortcode.match( inner_reg_exp ),
						shortcode_name = shortcode_element[2],
						shortcode_attributes = shortcode_element[3] !== ''
							? window.wp.shortcode.attrs( shortcode_element[3] )
							: '',
						shortcode_content = shortcode_element[5],
						module_cid = ET_PageBuilder_Layout.generateNewId(),
						module_settings,
						prefixed_attributes = {},
						found_inner_shortcodes = typeof shortcode_content !== 'undefined' && shortcode_content !== '' && shortcode_content.match( reg_exp );

					module_settings = {
						type : 'module',
						module_type : module_type,
						cid : ET_PageBuilder_Layout.generateNewId(),
						view : this_el,
						created : 'auto',
						mode : 'advanced',
						parent : this_el.attributes['cid']
					}

					if ( _.isObject( shortcode_attributes['named'] ) ) {
						for ( var key in shortcode_attributes['named'] ) {
							var prefixed_key = key !== 'admin_label' ? 'et_pb_' + key : key;

							if ( shortcode_name === 'column' && prefixed_key === 'et_pb_type' )
								prefixed_key = 'layout';

							prefixed_attributes[prefixed_key] = shortcode_attributes['named'][key];
						}

						module_settings = _.extend( module_settings, prefixed_attributes );
					}

					if ( ! found_inner_shortcodes ) {
						module_settings['et_pb_content_new'] = shortcode_content;
					}

					this_el.model.collection.add( [ module_settings ], { update_shortcodes : 'false' } );
				} );
			},

			removeModule : function() {
				// remove Module settings, when modal window is closed or saved

				_.each( this.child_views, function( view ) {
					view.removeView();
				} );

				this.remove();
			}

		} );

		ET_PageBuilder.AdvancedModuleSettingView = Backbone.View.extend( {
			tagName : 'li',

			initialize : function() {
				this.template = _.template( $( '#et-builder-advanced-setting' ).html() );
			},

			events : {
				'click .et-pb-advanced-setting-options' : 'showSettings',
				'click .et-pb-advanced-setting-remove' : 'removeView'
			},

			render : function() {
				var view;

				this.$el.html( this.template( this.model.attributes ) );

				view = new ET_PageBuilder.AdvancedModuleSettingTitleView( {
					model : this.model,
					view : this
				} );

				this.$el.prepend( view.render().el );

				this.child_view = view;

				this.showSettings();

				return this;
			},

			showSettings : function( event ) {
				var view;

				if ( event ) event.preventDefault();

				view = new ET_PageBuilder.AdvancedModuleSettingEditViewContainer( {
					view : this,
					attributes : {
						show_settings_clicked : ( event ? true : false )
					}
				} );

				$('.et_pb_modal_settings_container').after( view.render().el );
			},

			removeView : function( event ) {
				if ( event ) event.preventDefault();

				this.child_view.remove();

				this.remove();

				this.model.destroy();

				ET_PageBuilder_Events.trigger( 'et-advanced-module:updated' );
			}
		} );

		ET_PageBuilder.AdvancedModuleSettingTitleView = Backbone.View.extend( {
			tagName : 'span',

			className : 'et-sortable-title',

			initialize : function() {
				// TODO: detect the script id, using an option from the model

				template_name = '#et-builder-advanced-setting-' + this.model.get( 'module_type' ) + '-title';

				this.template = _.template( $( template_name ).html() );

				this.listenTo( ET_PageBuilder_Events, 'et-advanced-module:updated', this.render );
			},

			render : function() {
				var view;

				this.$el.html( this.template( this.model.attributes ) );

				return this;
			}
		} );

		ET_PageBuilder.AdvancedModuleSettingEditViewContainer = Backbone.View.extend( {
			className : 'et_pb_modal_settings_container',

			initialize : function() {
				this.template = _.template( $( '#et-builder-advanced-setting-edit' ).html() );

				this.model = this.options.view.model;

				this.listenTo( ET_PageBuilder_Events, 'et-modal-view-removed', this.removeView );
			},

			events : {
				'click .et-pb-modal-save' : 'saveSettings',
				'click .et-pb-modal-close' : 'removeView'
			},

			render : function() {
				var view,
					$color_picker,
					$upload_button;

				this.$el.html( this.template() );

				if ( this.model.get( 'created' ) !== 'auto' || this.attributes['show_settings_clicked'] ) {
					view = new ET_PageBuilder.AdvancedModuleSettingEditView( { view : this } );

					this.$el.append( view.render().el );

					this.child_view = view;
				}

				$color_picker = this.$el.find('.et-pb-color-picker-hex');

				if ( $color_picker.length ) {
					$color_picker.wpColorPicker();
				}

				$upload_button = this.$el.find('.et-pb-upload-button');

				if ( $upload_button.length ) {
					et_pb_activate_upload( $upload_button );
				}

				return this;
			},

			removeView : function( event ) {
				if ( event ) event.preventDefault();

				if ( this.$el.find( '#et_pb_content_new' ) )
					et_pb_tinymce_remove_control( 'et_pb_content_new' );

				if ( this.child_view )
					this.child_view.remove();

				this.remove();
			},

			saveSettings : function( event ) {
				var attributes = {};

				event.preventDefault();

				this.$( 'input, select, textarea' ).each( function() {
					var $this_el = $(this),
						setting_value;

					setting_value = $this_el.is('textarea#et_pb_content_new')
						? et_pb_get_content( 'et_pb_content_new' )
						: $this_el.val();

					attributes[$this_el.attr('id')] = setting_value;
				} );

				this.model.set( attributes, { silent : true } );

				ET_PageBuilder_Events.trigger( 'et-advanced-module:updated' );

				et_pb_tinymce_remove_control( 'et_pb_content_new' );

				this.removeView();
			}
		} );

		ET_PageBuilder.AdvancedModuleSettingEditView = Backbone.View.extend( {
			className : 'et_pb_module_settings',

			initialize : function() {
				this.model = this.options.view.options.view.model;

				this.template = _.template( $( '#et-builder-advanced-setting-' + this.model.get( 'module_type' ) ).html() );
			},

			events : {
			},

			render : function() {
				var $this_el = this.$el,
					$content_textarea,
					$content_textarea_container;

				this.$el.html( this.template( this.model.attributes ) );

				// TODO: convert it into function, it can be used in 2 places
				$content_textarea = this.$el.find( 'textarea#et_pb_content_new' );

				if ( $content_textarea.length ) {
					$content_textarea_container = $content_textarea.closest( '.et-pb-option-container' );

					content = $content_textarea.val();

					$content_textarea.remove();

					$content_textarea_container.prepend( et_pb_content_html );

					setTimeout( function() {
						if ( typeof window.switchEditors !== 'undefined' )
							window.switchEditors.go('et_pb_content_new', 'tmce');

						et_pb_set_content( 'et_pb_content_new', content );
					}, 100 );
				}

				setTimeout( function() {
					$this_el.find('select, input, textarea, radio').filter(':eq(0)').focus();
				}, 1 );

				return this;
			}
		} );

		ET_PageBuilder.BlockModuleView = Backbone.View.extend( {

			className : 'et_pb_module_block',

			template : _.template( $( '#et-builder-block-module-template' ).html() ),

			initialize : function() {
				this.listenTo( this.model, 'change:admin_label', this.renameModule );
			},

			events : {
				'click .et-pb-settings' : 'showSettings',
				'click .et-pb-remove' : 'removeModule'
			},

			render : function() {
				this.$el.html( this.template( this.model.attributes ) );

				if ( ET_PageBuilder_Layout.isModuleFullwidth( this.model.get( 'module_type' ) ) )
					this.$el.addClass( 'et_pb_fullwidth_module' );

				return this;
			},

			renameModule : function() {
				this.$( '.et-pb-module-title' ).html( this.model.get( 'admin_label' ) );
			},

			showSettings : function( event ) {
				var modal_view,
					view_settings = {
						model : this.model,
						collection : this.collection,
						attributes : {
							'data-open_view' : 'module_settings'
						}
					};

				event.preventDefault();

				// TODO: refactor the code, it's copied from the AppView's addModule function
				modal_view = new ET_PageBuilder.ModalView( view_settings );
				$('body').append( modal_view.render().el );
			},

			removeModule : function( event ) {
				if ( event ) event.preventDefault();

				this.model.destroy();

				ET_PageBuilder_Layout.removeView( this.model.get('cid') );

				this.remove();

				// if single module is removed from the builder
				if ( event )
					ET_PageBuilder_Events.trigger( 'et-module:removed' );
			}

		} );

		ET_PageBuilder.AppView = Backbone.View.extend( {

			el : $('#et_pb_main_container'),

			template : _.template( $('#et-builder-app-template').html() ),

			events: {
				'click .et-pb-layout-buttons-save' : 'saveLayout',
				'click .et-pb-layout-buttons-load' : 'loadLayout',
				'click .et-pb-layout-buttons-clear' : 'clearLayout'
			},

			initialize : function() {
				this.listenTo( this.collection, 'add', this.addModule );
				this.listenTo( ET_PageBuilder_Events, 'et-sortable:update', this.saveAsShortcode );
				this.listenTo( ET_PageBuilder_Events, 'et-model-changed-position-within-column', this.saveAsShortcode );
				this.listenTo( ET_PageBuilder_Events, 'et-module:removed', this.saveAsShortcode );
				this.listenTo( ET_PageBuilder_Events, 'et-pb-loading:started', this.startLoadingAnimation );
				this.listenTo( ET_PageBuilder_Events, 'et-pb-loading:ended', this.endLoadingAnimation );

				this.$builder_toggle_button = $( 'body' ).find( '#et_pb_toggle_builder' );

				this.render();

				this.maybeGenerateInitialLayout();
			},

			render : function() {
				this.$el.html( this.template() );

				this.makeSectionsSortable();

				this.addLoadingAnimation();

				return this;
			},

			addLoadingAnimation : function() {
				$( 'body' ).append( '<div id="et_pb_loading_animation"></div>' );

				this.$loading_animation = $( '#et_pb_loading_animation' ).hide();
			},

			startLoadingAnimation : function() {
				if ( this.pageBuilderIsActive() ) {
					// place the loading animation container before the closing body tag
					if ( this.$loading_animation.next().length ) {
						$( 'body' ).append( this.$loading_animation );
						this.$loading_animation = $( '#et_pb_loading_animation' );
					}

					this.$loading_animation.show();
				};
			},

			endLoadingAnimation : function() {
				this.$loading_animation.hide();
			},

			pageBuilderIsActive : function() {
				return this.$builder_toggle_button.hasClass( 'et_pb_builder_is_used' );
			},

			saveLayout : function( event ) {
				event.preventDefault();

				et_pb_create_prompt_modal( 'save_layout' );
			},

			loadLayout : function( event ) {
				event.preventDefault();

				var view;

				view = new ET_PageBuilder.ModalView( {
					attributes : {
						'data-open_view' : 'save_layout'
					},
					view : this
				} );

				$('body').append( view.render().el );
			},

			clearLayout : function( event ) {
				event.preventDefault();

				et_pb_create_prompt_modal( 'clear_layout' );
			},

			maybeGenerateInitialLayout : function() {
				var module_id = ET_PageBuilder_Layout.generateNewId(),
					this_el = this;

				ET_PageBuilder_Events.trigger( 'et-pb-loading:started' );

				setTimeout( function() {
					this_el.createLayoutFromContent( et_pb_get_content( 'content' ) );

					ET_PageBuilder_Events.trigger( 'et-pb-loading:ended' );

					// start listening to any collection events after all modules have been generated
					this_el.listenTo( this_el.collection, 'change reset add', this_el.saveAsShortcode );
				}, 1000 );
			},

			wp_regexp_not_global : _.memoize( function( tag ) {
				return new RegExp( '\\[(\\[?)(' + tag + ')(?![\\w-])([^\\]\\/]*(?:\\/(?!\\])[^\\]\\/]*)*?)(?:(\\/)\\]|\\](?:([^\\[]*(?:\\[(?!\\/\\2\\])[^\\[]*)*)(\\[\\/\\2\\]))?)(\\]?)' );
			}),

			createLayoutFromContent : function( content, parent_cid, inner_shortcodes ) {
				var this_el = this,
					et_pb_shortcodes_tags = typeof inner_shortcodes === 'undefined'
						? 'et_pb_section|et_pb_row|et_pb_column|et_pb_text|et_pb_blurb|et_pb_tabs|et_pb_testimonial|et_pb_toggle|et_pb_cta|et_pb_signup|et_pb_contact_form|et_pb_divider|et_pb_blog|et_pb_portfolio|et_pb_image|et_pb_shop|et_pb_slider|et_pb_pricing_tables|et_pb_counters|et_pb_fullwidth_slider|et_pb_sidebar|et_pb_fullwidth_header'
						: 'et_pb_tab|et_pb_slide|et_pb_pricing_table|et_pb_counter',
					reg_exp = window.wp.shortcode.regexp( et_pb_shortcodes_tags ),
					inner_reg_exp = this.wp_regexp_not_global( et_pb_shortcodes_tags ),
					matches = content.match( reg_exp );

				_.each( matches, function ( shortcode ) {
					var shortcode_element = shortcode.match( inner_reg_exp ),
						shortcode_name = shortcode_element[2],
						shortcode_attributes = shortcode_element[3] !== ''
							? window.wp.shortcode.attrs( shortcode_element[3] )
							: '',
						shortcode_content = shortcode_element[5],
						module_cid = ET_PageBuilder_Layout.generateNewId(),
						module_settings,
						prefixed_attributes = {},
						found_inner_shortcodes = typeof shortcode_content !== 'undefined' && shortcode_content !== '' && shortcode_content.match( reg_exp );

					if ( shortcode_name === 'et_pb_section' || shortcode_name === 'et_pb_row' || shortcode_name === 'et_pb_column' )
						shortcode_name = shortcode_name.replace( 'et_pb_', '' );

					module_settings = {
						type : shortcode_name,
						cid : module_cid,
						created : 'manually',
						module_type : shortcode_name
					}

					if ( shortcode_name !== 'section' )
						module_settings['parent'] = parent_cid;

					if ( shortcode_name.indexOf( 'et_pb_' ) !== -1 ) {
						module_settings['type'] = 'module';

						module_settings['admin_label'] = ET_PageBuilder_Layout.getTitleByShortcodeTag( shortcode_name );
					}

					if ( _.isObject( shortcode_attributes['named'] ) ) {
						for ( var key in shortcode_attributes['named'] ) {
							var prefixed_key = key !== 'admin_label' ? 'et_pb_' + key : key;

							if ( shortcode_name === 'column' && prefixed_key === 'et_pb_type' )
								prefixed_key = 'layout';

							prefixed_attributes[prefixed_key] = shortcode_attributes['named'][key];
						}

						module_settings = _.extend( module_settings, prefixed_attributes );
					}

					if ( ! found_inner_shortcodes ) {
						module_settings['et_pb_content_new'] = shortcode_content;
					}

					this_el.collection.add( [ module_settings ] );

					if ( found_inner_shortcodes ) {
						this_el.createLayoutFromContent( shortcode_content, module_cid );
					}
				} );
			},

			addModule : function( module ) {
				var view,
					modal_view,
					view_settings = {
						model : module,
						collection : ET_PageBuilder_Modules
					};

				switch ( module.get( 'type' ) ) {
					case 'section' :
						view = new ET_PageBuilder.SectionView( view_settings );

						ET_PageBuilder_Layout.addView( module.get('cid'), view );

						if ( ! _.isUndefined( module.get( 'view' ) ) )
							module.get( 'view' ).$el.after( view.render().el );
						else
							this.$el.append( view.render().el );

						if ( 'on' === module.get( 'et_pb_fullwidth' ) ) {
							$( view.render().el ).addClass( 'et_pb_section_fullwidth' );

							var sub_view = new ET_PageBuilder.ColumnView( view_settings );

							view.addChildView( sub_view );

							$( view.render().el ).find( '.et-pb-section-content' ).append( sub_view.render().el );
						}

						// add Rows layout once the section has been created in "auto" mode

						if ( 'manually' !== module.get( 'created' ) && 'on' !== module.get( 'et_pb_fullwidth' ) ) view.addRow();

						break;
					case 'row' :
						view = new ET_PageBuilder.RowView( view_settings );

						ET_PageBuilder_Layout.addView( module.get('cid'), view );

						/*this.$("[data-cid=" + module.get('parent') + "]").append( view.render().el );*/

						if ( ! _.isUndefined( module.get( 'appendAfter' ) ) )
							module.get( 'appendAfter' ).after( view.render().el );
						else
							ET_PageBuilder_Layout.getView( module.get( 'parent' ) ).$el.find( '.et-pb-section-content' ).append( view.render().el );
							/*module.get( 'view' ).$el.find( '.et-pb-section-content' ).append( view.render().el );*/

						break;
					case 'column' :
						view_settings['className'] = 'et-pb-column et-pb-column-' + module.get( 'layout' );

						view = new ET_PageBuilder.ColumnView( view_settings );

						ET_PageBuilder_Layout.addView( module.get('cid'), view );

						ET_PageBuilder_Layout.getView( module.get( 'parent' ) ).$el.find( '.et-pb-row-container' ).append( view.render().el );

						ET_PageBuilder_Layout.getView( module.get( 'parent' ) ).toggleInsertColumnButton();
						/*module.get( 'view' ).$el.find( '.et-pb-row-container' ).append( view.render().el );*/

						/*this.$("[data-cid=" + module.get('parent') + "] .et-pb-row-container").append( view.render().el );*/

						break;
					case 'module' :
						view_settings['attributes'] = {
							'data-cid' : module.get( 'cid' )
						}

						if ( typeof module.get( 'mode' ) !== 'undefined' && module.get( 'mode' ) === 'advanced' ) {
							// create sortable tab

							view = new ET_PageBuilder.AdvancedModuleSettingView( view_settings );

							module.attributes.view.child_views.push( view );

							ET_PageBuilder_Layout.getView( module.get( 'parent' ) ).$el.find('.et-pb-sortable-options').append( view.render().el );

							ET_PageBuilder_Layout.addView( module.get('cid'), view );

						} else {
							ET_PageBuilder_Events.trigger( 'et-new_module:show_settings' );

							view = new ET_PageBuilder.BlockModuleView( view_settings );

							if ( typeof module.attributes.view !== 'undefined' && module.attributes.view.model.get( 'et_pb_fullwidth' ) === 'on' ) {
								ET_PageBuilder_Layout.getView( module.get( 'parent' ) ).addChildView( view );
							}

							ET_PageBuilder_Layout.getView( module.get( 'parent' ) ).$el.find( '.et-pb-insert-module' ).before( view.render().el );

							ET_PageBuilder_Layout.addView( module.get('cid'), view );

							if ( 'manually' !== module.get( 'created' ) ) {
								// TODO: don't pass arguments using data-attributes, use normal values, like we pass with view
								view_settings['attributes'] = {
									'data-open_view' : 'module_settings'
								}
								modal_view = new ET_PageBuilder.ModalView( view_settings );
								$('body').append( modal_view.render().el );
							}
						}


						break;
				}
			},

			saveAsShortcode : function( et_model, et_collection, et_options ) {
				var shortcode = '',
					this_el = this;

				if ( et_options && et_options['update_shortcodes'] == 'false' )
					return;

				this.$el.find( '.et_pb_section' ).each( function() {
					var $this_section = $(this).find( '.et-pb-section-content' );

					shortcode += this_el.generateModuleShortcode( $(this), true );

					if ( $this_section.closest( '.et_pb_section' ).hasClass( 'et_pb_section_fullwidth' ) ) {
						$this_section.find( '.et_pb_module_block' ).each( function() {
							shortcode += this_el.generateModuleShortcode( $(this), false );
						} );
					} else {
						$this_section.find( '.et_pb_row' ).each( function() {
							var $this_row = $(this);

							shortcode += '[et_pb_row]';

							$this_row.find( '.et-pb-column' ).each( function() {
								var $this_column = $(this),
									column_cid = $this_column.data( 'cid' ),
									module = ET_PageBuilder_Modules.findWhere( { cid : column_cid } );

								shortcode += '[et_pb_column type="' + module.get('layout') + '"]';

								$this_column.find( '.et_pb_module_block' ).each( function() {
									shortcode += this_el.generateModuleShortcode( $(this), false );
								} );

								shortcode += '[/et_pb_column]';
							} );

							shortcode += '[/et_pb_row]';
						} );
					}

					shortcode += '[/et_pb_section]';
				} );

				setTimeout( function(){
					et_pb_set_content( 'content', shortcode );
				}, 500 );
			},

			generateModuleShortcode : function( $module, open_tag_only ) {
				var attributes = '',
					content = '',
					$this_module = $module,
					prefix = $this_module.is( '.et_pb_section' ) || $this_module.is( '.et_pb_row' )
						? 'et_pb_'
						: '',
					module_cid = typeof $this_module.data( 'cid' ) === 'undefined'
						? $this_module.find( '.et-pb-data-cid' ).data( 'cid' )
						: $this_module.data( 'cid' ),
					module = ET_PageBuilder_Modules.find( function( model ) {
						return model.get('cid') == module_cid;
					} ),
					module_type = typeof module !== 'undefined' ? module.get( 'module_type' ) : 'undefined',
					module_settings,
					shortcode;

				module_settings = module.attributes;

				for ( var key in module_settings ) {
					var setting_name = key,
						setting_value;

					if ( setting_name.indexOf( 'et_pb_' ) === -1 && setting_name !== 'admin_label' ) continue;

					setting_value = typeof( module.get( setting_name ) ) !== 'undefined' ? module.get( setting_name ) : '';

					if ( setting_name === 'et_pb_content_new' ) {
						content = setting_value;
					} else if ( setting_value !== '' ) {
						setting_name = setting_name.replace( 'et_pb_', '' );
						attributes += ' ' + setting_name + '="' + setting_value + '"';
					}
				}

				shortcode = '[' + prefix + module_type + attributes;

				if ( content === '' && ( typeof module_settings['type'] !== 'undefined' && module_settings['type'] === 'module' ) ) {
					open_tag_only = true;
					shortcode += ' /]';
				} else {
					shortcode += ']';
				}

				if ( ! open_tag_only )
					shortcode += content + '[/' + prefix + module_type + ']';

				return shortcode;
			},

			makeSectionsSortable : function() {
				this.$el.sortable( {
					cancel : '.et-pb-settings, .et-pb-remove, .et-pb-section-add, .et-pb-row-add, .et-pb-insert-module, .et-pb-insert-column, #et_pb_layout_controls',
					update : function( event, ui ) {
						ET_PageBuilder_Events.trigger( 'et-sortable:update' );
					}
				} );
			},

			reInitialize : function() {
				var content = et_pb_get_content( 'content' ),
					contentIsEmpty = content == '';

				ET_PageBuilder_Events.trigger( 'et-pb-loading:started' );

				this.removeAllSections();

				if ( content.indexOf( '[et_pb_section' ) === -1 ) {
					if ( ! contentIsEmpty )
						content = '[et_pb_column type="4_4"][et_pb_text]' + content + '[/et_pb_text][/et_pb_column]';

					content = '[et_pb_section][et_pb_row]' + content + '[/et_pb_row][/et_pb_section]';
				}

				this.createNewLayout( content );

				ET_PageBuilder_Events.trigger( 'et-pb-loading:ended' );
			},

			removeAllSections : function( create_initial_layout ) {
				var content;

				// force removal of all the sections and rows
				ET_PageBuilder_Layout.set( 'forceRemove', true );

				this.$el.find( '.et-pb-section-content' ).each( function() {
					var $this_el = $(this);

					ET_PageBuilder_Layout.getView( $this_el.data( 'cid' ) ).removeSection();
				} );

				ET_PageBuilder_Layout.set( 'forceRemove', false );

				if ( create_initial_layout ) {
					content = '[et_pb_section][et_pb_row][/et_pb_row][/et_pb_section]';
					this.createNewLayout( content );
				}
			},

			// creates new layout from any content and saves new shortcodes once
			createNewLayout : function( content ) {
				this.stopListening( this.collection, 'change reset add', this.saveAsShortcode );

				this.createLayoutFromContent( content );

				this.saveAsShortcode();

				this.listenTo( this.collection, 'change reset add', this.saveAsShortcode );
			}

		} );

		function et_pb_activate_upload( $upload_button ) {
			$upload_button.click( function( event ) {
				var $this_el = $(this);

				event.preventDefault();

				et_pb_file_frame = wp.media.frames.et_pb_file_frame = wp.media({
					title: $this_el.data( 'choose' ),
					library: {
						type: $this_el.data( 'type' )
					},
					button: {
						text: $this_el.data( 'update' ),
					},
					multiple: false
				});

				et_pb_file_frame.on( 'select', function() {
					var attachment = et_pb_file_frame.state().get('selection').first().toJSON();

					$this_el.siblings( '.et-pb-upload-field' ).val( attachment.url );

					et_pb_generate_preview_image( $this_el );
				});

				et_pb_file_frame.open();
			} );

			$upload_button.siblings( '.et-pb-upload-field' ).on( 'input', function() {
				et_pb_generate_preview_image( $(this).siblings( '.et-pb-upload-button' ) );
			} );

			$upload_button.siblings( '.et-pb-upload-field' ).each( function() {
				et_pb_generate_preview_image( $(this).siblings( '.et-pb-upload-button' ) );
			} );
		}

		function et_pb_generate_preview_image( $upload_button ){
			var $upload_field = $upload_button.siblings( '.et-pb-upload-field' ),
				$preview = $upload_field.siblings( '.et-pb-upload-preview' ),
				image_url = $upload_field.val().trim();

			if ( $upload_button.data( 'type' ) !== 'image' ) return;

			if ( image_url === '' ) {
				if ( $preview.length ) $preview.remove();

				return;
			}

			if ( ! $preview.length ) {
				$upload_button.after( '<div class="et-pb-upload-preview">' + '<strong class="et-pb-upload-preview-title">' + et_pb_options.preview_image + '</strong>' + '<img src="" width="300" height="300" /></div>' );
				$preview = $upload_field.siblings( '.et-pb-upload-preview' );
			}

			$preview.find( 'img' ).attr( 'src', image_url );
		}

		var ET_PageBuilder_Events = _.extend( {}, Backbone.Events ),

			ET_PageBuilder_Layout = new ET_PageBuilder.Layout,

			ET_PageBuilder_Modules = new ET_PageBuilder.Modules,

			ET_PageBuilder_App = new ET_PageBuilder.AppView( {
				model : ET_PageBuilder.Module,
				collection : ET_PageBuilder_Modules
			} ),

			$et_pb_content = $( '#et_pb_hidden_editor' ),

			et_pb_content_html = $et_pb_content.html(),

			et_pb_file_frame,

			$toggle_builder_button = $('#et_pb_toggle_builder'),

			$builder = $( '#et_pb_layout' ),

			$et_pb_old_content = $('#et_pb_old_content'),

			$use_builder_custom_field = $( '#et_pb_use_builder' ),

			$main_editor_wrapper = $( '#et_pb_main_editor_wrap' ),

			$et_pb_setting = $( '.et_pb_page_setting' ),

			$et_pb_layout_settings = $( '.et_pb_page_layout_settings' );

		$et_pb_content.remove();

		if ( $toggle_builder_button.hasClass( 'et_pb_builder_is_used' ) ) {
			$builder.show();

			et_pb_hide_layout_settings();
		}

		$toggle_builder_button.click( function( event ) {
			event.preventDefault();

			var $this_el = $(this),
				is_builder_used = $this_el.hasClass( 'et_pb_builder_is_used' ),
				content;

			if ( is_builder_used ) {
				et_pb_create_prompt_modal( 'deactivate_builder' );
			} else {
				content = et_pb_get_content( 'content' );

				$et_pb_old_content.val( content );

				ET_PageBuilder_App.reInitialize();

				$use_builder_custom_field.val( 'on' );

				$builder.show();

				$this_el.text( $this_el.data( 'editor' ) );

				$main_editor_wrapper.toggleClass( 'et_pb_hidden' );

				$this_el.toggleClass( 'et_pb_builder_is_used' );

				et_pb_hide_layout_settings();
			}
		} );

		function et_pb_deactivate_builder() {
			et_pb_set_content( 'content', $et_pb_old_content.val() );

			$use_builder_custom_field.val( 'off' );

			$builder.hide();

			$toggle_builder_button.text( $toggle_builder_button.data( 'builder' ) ).toggleClass( 'et_pb_builder_is_used' );

			$main_editor_wrapper.toggleClass( 'et_pb_hidden' );

			et_pb_show_layout_settings();
		}

		function et_pb_create_prompt_modal( action ) {
			var	$modal = $( '<div class="et_pb_modal_overlay" data-action="' + action + '"></div>' ),
				modal_interface = $( '#et-builder-prompt-modal-' + action ).length ? $( '#et-builder-prompt-modal-' + action ).html() : $( '#et-builder-prompt-modal' ).html(),
				modal_content = $( '#et-builder-prompt-modal-' + action + '-text' ).html();

			$modal.append( modal_interface );

			$modal.find( '.et_pb_prompt_modal' ).prepend( modal_content );

			$( 'body' ).append( $modal );

			setTimeout( function() {
				$modal.find('select, input, textarea, radio').filter(':eq(0)').focus();
			}, 1 );

			$( '.et_pb_modal_overlay .et_pb_prompt_proceed' ).click( function( event ) {
				event.preventDefault();

				var $prompt_modal = $(this).closest( '.et_pb_modal_overlay' );

				switch( $prompt_modal.data( 'action' ).trim() ){
					case 'deactivate_builder' :
						et_pb_deactivate_builder();
						break;
					case 'clear_layout' :
						ET_PageBuilder_App.removeAllSections( true );
						break;
					case 'save_layout' :
						var layout_name = $prompt_modal.find( '#et_pb_new_layout_name' ).val().trim();

						if ( layout_name == '' ) {
							$prompt_modal.find( '#et_pb_new_layout_name' ).focus()

							return;
						}

						$.ajax( {
							type: "POST",
							url: et_pb_options.ajaxurl,
							data:
							{
								action : 'et_pb_save_layout',
								et_load_nonce : et_pb_options.et_load_nonce,
								et_layout_name : layout_name,
								et_layout_content : et_pb_get_content( 'content' )
							},
							success: function( data ) {
							}
						} );

						break;
				}

				$prompt_modal.remove();
			} );

			$( '.et_pb_modal_overlay .et_pb_prompt_dont_proceed' ).click( function( event ) {
				event.preventDefault();

				$(this).closest( '.et_pb_modal_overlay' ).remove();
			} );
		}

		function et_pb_hide_layout_settings(){
			if ( $et_pb_setting.filter( ':visible' ).length > 1 )
				$et_pb_layout_settings.hide();
			else
				$et_pb_layout_settings.closest( '#et_settings_meta_box' ).hide();
		}

		function et_pb_show_layout_settings(){
			$et_pb_layout_settings.show().closest( '#et_settings_meta_box' ).show();
		}

		function et_pb_get_content( textarea_id ) {
			var content;

			content = typeof window.tinyMCE !== 'undefined' && typeof window.tinyMCE.get( textarea_id ) !== 'undefined' && ! window.tinyMCE.get( textarea_id ).isHidden()
				? window.tinyMCE.get( textarea_id ).getContent()
				: $( '#' + textarea_id ).val();

			return content.trim();
		}

		function et_pb_set_content( textarea_id, content ) {
			if ( typeof window.tinyMCE !== 'undefined' && typeof window.tinyMCE.get( textarea_id ) !== 'undefined' && ! window.tinyMCE.get( textarea_id ).isHidden() )
				window.tinyMCE.get( textarea_id ).setContent( window.switchEditors.wpautop( content ), { format : 'html'  } );
			else
				$( '#' + textarea_id ).val( content );
		}

		function et_pb_tinymce_remove_control( textarea_id ) {
			if ( typeof window.tinyMCE !== 'undefined' )
				window.tinyMCE.execCommand( 'mceRemoveControl', false, textarea_id );
		}
	} );

} )(jQuery);