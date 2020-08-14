CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert','uploadimage' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Underline,Subscript,Superscript,Scayt,Anchor,Maximize,Source,About,Strike,SpecialChar,Cut,Copy,Paste,PasteText,PasteFromWord';

	config.extraPlugins = 'uploadimage';
	config.removeDialogTabs = 'link:upload;image:Upload';

	config.filebrowserImageBrowseUrl= '/filemanager?type=Images',
    config.filebrowserImageUploadUrl= '/filemanager/upload?type=Images&_token=',
    config.filebrowserBrowseUrl= '/filemanager?type=Files',
    config.filebrowserUploadUrl= '/filemanager/upload?type=Files&_token='
};