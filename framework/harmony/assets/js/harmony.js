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

/*
 * ============================================================
 * Harmony Module Menu
 * ============================================================
 */

const addButton = document.querySelector('.sap-add-module');
const moduleMenu = document.querySelector('.sap-module-menu');

if (addButton && moduleMenu) {

	addButton.addEventListener('click', function (event) {

		event.stopPropagation();

		moduleMenu.style.display =
			moduleMenu.style.display === 'block'
				? 'none'
				: 'block';

	});

	document.addEventListener('click', function () {

		moduleMenu.style.display = 'none';

	});

}	

	document.addEventListener('click', function (event) {

	    const module = event.target.closest('.sap-harmony-module');

	    if (!module) {
		    return;
	    }

	    document
		    .querySelectorAll('.sap-harmony-module.is-selected')
		    .forEach(function (item) {
			    item.classList.remove('is-selected');
		});

	    module.classList.add('is-selected');

	    /*
	     * Update the Harmony Inspector.
	     */
	    document.getElementById('sap-inspector-name').textContent =
		    module.dataset.moduleName;

	    document.getElementById('sap-inspector-type').textContent =
		    module.dataset.moduleType;

	    document.getElementById('sap-inspector-id').textContent =
		    module.dataset.moduleId;

	    console.clear();

	    console.log('Harmony Module Selected');

	    console.log('ID:', module.dataset.moduleId);
	    console.log('Name:', module.dataset.moduleName);
	    console.log('Type:', module.dataset.moduleType);

    });

});