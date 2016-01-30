var $          = require('jquery');
var ModuleEdit = require('views/module-edit');

/**
 * Header Module.
 * Extends default moudule with custom different template.
 */
var HeaderModuleEditView = ModuleEdit.extend({
	template: $( '#tmpl-ustwo-module-edit-header' ).html(),
});

module.exports = HeaderModuleEditView;
