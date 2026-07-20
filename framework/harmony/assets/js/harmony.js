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

	const Harmony = {

		collection: [],

		selected: null,

		addModule(type) {

			const module = {
				id: 'module_' + Date.now(),
				type: type,
				name: type.charAt(0).toUpperCase() + type.slice(1)
			};

			this.collection.push(module);

			this.renderCanvas();

		},

		createModule(module) {

			const element = document.createElement('div');

			element.className = 'sap-harmony-module';

			element.dataset.moduleId = module.id;
			element.dataset.moduleName = module.name;
			element.dataset.moduleType = module.type;

			element.innerHTML = `
				<h2>${module.name}</h2>
				<p>${module.type} module</p>
			`;

			return element;

		},

		renderCanvas() {

			const canvas = document.querySelector('.sap-harmony-canvas');

			if (!canvas) {
				return;
			}

			canvas.innerHTML = '';

			this.collection.forEach((module) => {

				canvas.appendChild(
					this.createModule(module)
				);

			});

		}

	};

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

		if (module) {

			document
				.querySelectorAll('.sap-harmony-module.is-selected')
				.forEach(function (item) {
					item.classList.remove('is-selected');
				});

			module.classList.add('is-selected');

			const name = document.getElementById('sap-inspector-name');
			const type = document.getElementById('sap-inspector-type');
			const id = document.getElementById('sap-inspector-id');

			if (name) {
				name.textContent = module.dataset.moduleName;
			}

			if (type) {
				type.textContent = module.dataset.moduleType;
			}

			if (id) {
				id.textContent = module.dataset.moduleId;
			}

			return;

		}

		const card = event.target.closest('.sap-harmony-module-card');

		if (card) {

			Harmony.addModule(card.dataset.module);

		}

	});

});