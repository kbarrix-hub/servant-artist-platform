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

			this.selected = module.id;

			this.renderCanvas();

		},

		selectModule(id) {

			this.selected = id;

			this.renderCanvas();

		},

		createModule(module) {

			const element = document.createElement('div');

			element.className = 'sap-harmony-module';

			if (module.id === this.selected) {
				element.classList.add('is-selected');
			}

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

			const canvas = document.querySelector(
				'.sap-harmony-live-canvas'
			);

			if (!canvas) {
				return;
			}

			// Preserve the editor overlay.
			const overlay = canvas.querySelector(
				'.sap-harmony-overlay'
			);

			canvas.innerHTML = '';

			if (overlay) {
				canvas.appendChild(overlay);
			}

			this.collection.forEach((module) => {

				canvas.appendChild(
					this.createModule(module)
				);

			});

			const selected = this.collection.find(
				module => module.id === this.selected
			);

			document.getElementById('sap-inspector-name').textContent =
				selected ? selected.name : 'None';

			document.getElementById('sap-inspector-type').textContent =
				selected ? selected.type : 'None';

			document.getElementById('sap-inspector-id').textContent =
				selected ? selected.id : 'None';

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

		const module = event.target.closest(
			'.sap-harmony-module'
		);

		if (module) {

			Harmony.selectModule(
				module.dataset.moduleId
			);

			return;

		}

		const card = event.target.closest(
			'.sap-harmony-module-card'
		);

		if (card) {

			Harmony.addModule(
				card.dataset.module
			);

		}

	});

});