/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */
// 设置参考： http://www.cnblogs.com/francis67/archive/2010/03/22/1691737.html
CKEDITOR.editorConfig = function( config ) {
	config.language = 'zh-cn';
	//config.uiColor = '#AADC6E';
    //config.width = 400;
    //config.height  = 400;
    //config.skin = 'v2';
    config.toolbar = 'Full';
    config.toolbar_Full = [
           ['Templates', 'Preview', 'Find', '-', 'Undo','Redo', '-', 'SelectAll','RemoveFormat'],
           ['Cut','Copy','Paste','PasteText'],
           ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
           ['JustifyLeft','JustifyCenter', 'JustifyRight','JustifyBlock'],
           ['Link','Unlink','Table'],
           '/',
           ['Format','Font','FontSize'],['TextColor','BGColor','-', 'Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
           ['Source']
    ];
    config.toolbarCanCollapse = true;
    config.toolbarLocation = 'top';
    config.resize_enabled = true;
    config.resize_maxHeight = 3000;
    config.resize_maxWidth = 3000;
    config.resize_minHeight = 250;
    config.resize_minWidth = 750;
    //config.autoUpdateElement = true;
    //config.baseHref = '';
    //config.baseFloatZIndex = 10000;
    //config.extraPlugins = 'tableresize';// 不清楚为什么不能用

};
