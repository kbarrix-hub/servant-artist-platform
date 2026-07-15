/**
 * ============================================================
 * Servant Artist Platform
 * ============================================================
 *
 * Harmony Engine
 *
 * Visual Designer
 */

document.addEventListener('DOMContentLoaded', function () {

	console.log('Harmony Loaded');

	document.addEventListener('click', function (event) {

		const module = event.target.closest('.sap-harmony-module');

		if (!module) {
			return;
		}

		console.clear();

		console.log('Harmony Module Selected');

		console.log('ID:', module.dataset.moduleId);
		console.log('Name:', module.dataset.moduleName);
		console.log('Type:', module.dataset.moduleType);

	});

});