$(document).ready(function(){
	var editor, html = '';
	createEditor();

	function createEditor() {
		if ( editor )
			return;

		// Create a new editor inside the <div id="editor">, setting its value to html
		var config = {};
		editor = CKEDITOR.appendTo( 'editor', config, html );
	}

	function removeEditor() {
		if ( !editor )
			return;

		// Retrieve the editor contents. In an Ajax application, this data would be
		// sent to the server or used in any other way.
		document.getElementById( 'editorcontents' ).innerHTML = html = editor.getData();
		document.getElementById( 'contents' ).style.display = '';

		// Destroy the editor.
		editor.destroy();
		editor = null;
	}

	$('#editorToggle').toggle(function(){
		$(this).val('编辑');
		removeEditor();
	}, function(){
		$(this).val('预览');
		createEditor();
	});

});

$(document).ready(function(){
	$.ajax({
		url: BASE + "/dashboard/personaladcontent",
		data: {},
		type:"GET",
		dataType:"json",
		success: function(re){
			CKEDITOR.instances.editor1.setData(re, function() {
				//console.log(re);
			    this.checkDirty();

				//发起ajax请求，更新或添加征婚启事
				$('#editorSubmit').click(function(){
					var submitData = CKEDITOR.instances.editor1.getData();

					$.ajax({
						url: BASE + "/dashboard/personalad",
						data: {
							"submitData" : submitData
						},
						type:"POST",
						dataType:"html",
						success: function(re){
							// console.log(re);
							reJSON = JSON.parse(re);

							if (reJSON.success == false) {
								alertify.error("保存失败！");
							} else if (reJSON.success == true) {
								alertify.success("保存成功！");
							};
						},
						error: function(re) {
							//console.log(re);
						}
					});
				});
			});
		},
		error: function(re) {
			//console.log(re);
		}
	});
});
