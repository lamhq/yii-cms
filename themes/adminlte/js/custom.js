window.app = {
	setupPermissionTree: function(id, items) {
		var tree = $('#'+id);
		tree.on('changed.jstree', function (e, data) {
			var selecteds = tree.jstree('get_top_selected');
			tree.closest('.tree-checkbox')
				.find('input[type="hidden"]')
				.val(JSON.stringify(selecteds));
		}).jstree({
			'plugins':['checkbox'],
			'core' : {
				'data' : items
			}
		});
	},
	
	setupRoleForm: function() {
		var updateFormVisibility = function () {
			if ( $('#Role_isMaster').is(':checked') ) {
				$('.tree-checkbox').hide();
			} else {
				$('.tree-checkbox').show();
			}
		};
		$('#Role_isMaster').click(updateFormVisibility);
		updateFormVisibility();
	}
};