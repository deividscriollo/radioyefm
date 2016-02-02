(function() {
	var command_name = 'dt_mce_command-google_map';
    var plugin_name = 'dt_mce_plugin_shortcode_google_map';
    
	tinymce.PluginManager.requireLangPack(plugin_name);
	
	tinymce.create( 'tinymce.plugins.' + plugin_name, {		 
		init : function( ed, url ) {
			
			ed.addCommand(command_name, function() {
                
				ed.windowManager.open({
					
                    resizable: false,
					file : url + '/window.php',
					width : 360,
					height : 260,
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});

			// Register example button
			ed.addButton( plugin_name, {
				
				title : 'Google Map',
				cmd : command_name,
				image : url + '/sc-exclamation.png'
				
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add( function( ed, cm, n ) {
				
				cm.setActive( command_name, n.nodeName == 'IMG');
				
			});
		}
	});

	// Register plugin
	tinymce.PluginManager.add( plugin_name, tinymce.plugins.dt_mce_plugin_shortcode_google_map );
	
})();
