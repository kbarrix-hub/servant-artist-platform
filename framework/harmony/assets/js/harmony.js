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

            selectedModuleId: null,

            replaceCanvas(html) {

	const currentCanvas = document.querySelector(
		'.sap-harmony-live-canvas'
	);

	if (!currentCanvas) {

		console.error(
			'Harmony: live canvas not found.'
		);

		return;

	}

	currentCanvas.innerHTML = html;

	currentCanvas.querySelectorAll(
		'.sap-harmony-module'
	).forEach(module => {

		module.setAttribute(
			'draggable',
			'true'
		);

	});

},

		updateInspector(selection) {

    const inspector = document.getElementById(
        'sap-harmony-inspector-content'
    );

    if (!inspector) {
        return;
    }

    if (
        !selection ||
        !selection.id
    ) {

        inspector.innerHTML = `
            <p>Select a module to edit its properties.</p>
        `;

        return;

    }

    inspector.innerHTML = `
        <div class="sap-inspector-group">

            <label>Module</label>

            <input
                type="text"
                value="${selection.module ?? ''}"
                readonly
            >

        </div>

        <div class="sap-inspector-group">

            <label>Type</label>

            <input
                type="text"
                value="${selection.type ?? ''}"
                readonly
            >

        </div>

        <div class="sap-inspector-group">

            <label>ID</label>

            <input
                type="text"
                value="${selection.id ?? ''}"
                readonly
            >

        </div>
    `;

},

	};

    const Transport = {

	send(request) {

    return fetch(SAPHarmony.ajaxUrl, {

        method: 'POST',

        headers: {
            'Content-Type':
                'application/x-www-form-urlencoded'
        },

        body: new URLSearchParams({

            action: 'sap_harmony_command',

            nonce: SAPHarmony.nonce,

            command: request.command.toUpperCase(),

            payload: JSON.stringify(
                request.payload
            )

        })

    })
    .then(response => response.json())
    .then(data => {

        console.log(
            'Harmony Response:',
            data
        );

		return data;

    })
    .catch(error => {

        console.error(
            'Harmony Error:',
            error
        );

    });

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

    /**
     * Send a command to the Harmony Engine.
     *
     * Today this routes commands to the JavaScript prototype.
     * Later this method will send AJAX requests to the
     * PHP Harmony Command Handler.
     *
     * @param {string} command
     * @param {Object} payload
     */
    sendCommand(command, payload = {}) {

	const request = {
		command: command,
		payload: payload
	};

	return Transport.send(request);

},

    addModule(type) {

	this.sendCommand(
		'add_module',
		{
			type: type
		}
	)
	.then((response) => {

		if (
			response.success &&
			response.data &&
			response.data.result &&
			response.data.result.success
		) {

			Harmony.replaceCanvas(
				response.data.result.canvas
			);

			Harmony.updateInspector(
				response.data.result.selected
			);

		}

	})
	.catch((error) => {

		console.error(
			'ADD_MODULE failed:',
			error
		);

	});

},

    selectModule(id, name, type) {

	Harmony.selectedModuleId = id;

	    this.sendCommand(
		    'select_module',
		    {
			    id: id,
			    name: name,
			    type: type
		    }
	    )
		
	.then((response) => {

		if (
			response.success &&
			response.data &&
			response.data.result &&
			response.data.result.success
		) {

			Harmony.replaceCanvas(
                response.data.result.canvas
            );

            Harmony.updateInspector(
                response.data.result.selected
            );

		}

	})
	.catch((error) => {

		console.error(
			'SELECT_MODULE failed:',
			error
		);

	});

},

	newDocument() {

		if (
			!confirm(
				'Create a new website?\n\nAll current modules will be removed.'
			)
		) {
			return;
		}

		this.sendCommand('new_document')
			.then((response) => {

				if (
					response.success &&
					response.data &&
					response.data.result &&
					response.data.result.success
				) {

					Harmony.replaceCanvas(
						response.data.result.canvas
					);

					Harmony.selectedModuleId = null;

                    Harmony.updateInspector(
                        response.data.result.selected
					);

				}

			})
			.catch((error) => {

				console.error(
					'NEW_DOCUMENT failed:',
					error
				);

			});

	    },


	deleteModule() {

		if (
			!confirm(
				'Delete the selected module?'
			)
		) {
			return;
		}

		this.sendCommand(
            'delete_module',
            {
                id: Harmony.selectedModuleId
            }
        )
			.then((response) => {

				if (
					response.success &&
					response.data &&
					response.data.result &&
					response.data.result.success
				) {

				Harmony.replaceCanvas(
                    response.data.result.canvas
                );

                Harmony.selectedModuleId = null;

                Harmony.updateInspector(
                    response.data.result.selected
                );

				}

			})
			.catch((error) => {

				console.error(
					'DELETE_MODULE failed:',
					error
				);

			});

	}

};


	const addButton = document.querySelector('.sap-add-module');
	const moduleMenu = document.querySelector('.sap-module-menu');
	const newButton = document.querySelector('.sap-new-document');
	const deleteButton = document.querySelector('.sap-delete-module');

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

    if (newButton) {

	newButton.addEventListener(
		'click',
		function () {

			HarmonyAPI.newDocument();

		}
	);

}

    if (deleteButton) {

	deleteButton.addEventListener(
		'click',
		function () {

			HarmonyAPI.deleteModule();

		}
	);

}
    
    document.addEventListener('click', function (event) {

		const module = event.target.closest(
			'.sap-harmony-module'
		);

		if (module) {

			HarmonyAPI.selectModule(
                module.dataset.moduleId,
                module.dataset.moduleName,
                module.dataset.moduleType
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

	window.HarmonyAPI = HarmonyAPI;
        window.Harmony = Harmony;

});