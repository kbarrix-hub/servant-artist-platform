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

		dropIndicator: null,

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

		showDropIndicator(y) {

			if (!this.dropIndicator) {

				this.dropIndicator = document.getElementById(
					'sap-harmony-drop-indicator'
				);

			}

			if (!this.dropIndicator) {
				return;
			}

			this.dropIndicator.style.display = 'block';
			this.dropIndicator.style.top = y + 'px';

		},

		hideDropIndicator() {

			if (!this.dropIndicator) {
				return;
			}

			this.dropIndicator.style.display = 'none';

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

			const inspectorName = document.getElementById(
				'sap-inspector-name'
			);

			const inspectorType = document.getElementById(
				'sap-inspector-type'
			);

			const inspectorId = document.getElementById(
				'sap-inspector-id'
			);

			if (inspectorName) {
				inspectorName.textContent =
					selected ? selected.name : 'None';
			}

			if (inspectorType) {
				inspectorType.textContent =
					selected ? selected.type : 'None';
			}

			if (inspectorId) {
				inspectorId.textContent =
					selected ? selected.id : 'None';
			}


		}

	};

	/**
	 * ============================================================
	 * Harmony API
	 * ============================================================
	 *
	 * The UI communicates with Harmony through this API.
	 * Today it delegates to the prototype engine.
	 * Later these methods will call the PHP Command Handler.
	 */

	const HarmonyAPI = {

	    addModule(type) {

		    Harmony.addModule(type);

	    },

	    selectModule(id) {

		    Harmony.selectModule(id);

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

			HarmonyAPI.selectModule(
				module.dataset.moduleId
			);

			return;

		}

		const card = event.target.closest(
			'.sap-harmony-module-card'
		);

		if (card) {

	        HarmonyAPI.addModule(
		        card.dataset.module
	        );

		}

	});

});