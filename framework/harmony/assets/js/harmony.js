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

			document.getElementById(
				'sap-inspector-name'
			).textContent =
				selection?.name ?? 'None';

			document.getElementById(
				'sap-inspector-type'
			).textContent =
				selection?.type ?? 'None';

			document.getElementById(
				'sap-inspector-id'
			).textContent =
				selection?.id ?? 'None';

		}

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