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

			version: 'SAP091-test',

            selectedModuleId: null,

			drag: {
		        active: false,
		        source: null,
		        target: null,
		        position: 'before'
				
	        },

			dropIndicator: null,

			applySelection() {

    document
        .querySelectorAll('.sap-harmony-module')
        .forEach(module => {

            module.classList.remove(
                'sap-harmony-selected'
            );

            if (
                module.dataset.moduleId ===
                this.selectedModuleId
            ) {

                module.classList.add(
                    'sap-harmony-selected'
                );

            }

        });

},

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

    module.removeAttribute(
        'draggable'
    );

});

this.applySelection();

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

			<h3>${selection.name ?? 'Module'} Settings</h3>

		</div>

		<div class="sap-inspector-group">

			<label>Heading</label>

			<input
				type="text"
				id="sap-inspector-title"
				value="${selection.title ?? ''}"
			>

		</div>

		<div class="sap-inspector-group">

			<label>Content</label>

			<textarea
				id="sap-inspector-content"
				rows="6"
			>${selection.content ?? ''}</textarea>

		</div>

		<div class="sap-inspector-group">

			<button
				type="button"
				id="sap-save-module"
				class="button button-primary"
			>
				Save Module
			</button>

		</div>
	`;

	const saveButton = document.getElementById(
		'sap-save-module'
	);

	if (!saveButton) {
		return;
	}

	saveButton.addEventListener(
		'click',
		function () {

			const title = document.getElementById(
				'sap-inspector-title'
			).value;

			const content = document.getElementById(
				'sap-inspector-content'
			).value;

			HarmonyAPI.saveModule(
				selection.id,
				title,
				content
			);	
    
		}
	);    	

}, 

    showDropIndicator(module) {

    if (!this.dropIndicator || !module) {
        return;
    }

    const rect = module.getBoundingClientRect();

    const canvas = document.querySelector(
        '.sap-harmony-live-canvas'
    );

    if (!canvas) {
        return;
    }

    const canvasRect = canvas.getBoundingClientRect();

    let top =
        rect.top - canvasRect.top;

    if (this.drag.position === 'after') {

        top += rect.height;

    }

    this.dropIndicator.style.display = 'block';

    this.dropIndicator.style.top =
        top + 'px';

    this.dropIndicator.style.left = '0';

    this.dropIndicator.style.width = '100%';

},

hideDropIndicator() {

    if (this.dropIndicator) {
        this.dropIndicator.style.display = 'none';
    }

},
    	beginDrag(sourceId) {

		this.drag.active = true;
		this.drag.source = sourceId;
		this.drag.target = null;
		this.drag.position = 'before';

	},

	endDrag() {

		this.drag.active = false;
		this.drag.source = null;
		this.drag.target = null;
		this.drag.position = 'before';

	},    

	};

	console.log('Harmony Object:', Harmony);
    console.log('Harmony Keys:', Object.keys(Harmony));

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

		if (
            response.data.result.selected &&
            response.data.result.selected.id
        ) {

            Harmony.selectedModuleId =
                response.data.result.selected.id;

        }

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

    saveModule(id, title, content) {

        this.sendCommand(
            'save_module',
        {
            id: id,
            title: title,
            content: content
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
            'SAVE_MODULE failed:',
            error
        );

    });

},

    moveModule(source, target, position) {

    this.sendCommand(
        'move_module',
        {
            source: source,
            target: target,
            position: position
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
            'MOVE_MODULE failed:',
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

				if (
                    response.data.result.selected &&
                    response.data.result.selected.id
                ) {

                    Harmony.selectedModuleId =
                    response.data.result.selected.id;

                }
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
	Harmony.dropIndicator = document.querySelector(
    '.sap-harmony-drop-indicator'
);

if (Harmony.dropIndicator) {

    Harmony.dropIndicator.style.display = 'none';

}

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

	document.addEventListener(
	'pointerdown',
	function (event) {

		const module = event.target.closest(
			'.sap-harmony-module'
		);

		if (!module) {
			return;
		}

		Harmony.beginDrag(
			module.dataset.moduleId
		);

		console.log(
			'Pointer Down:',
			Harmony.drag
		);

	}
);


document.addEventListener(
    'pointermove',
    function (event) {

        if (!Harmony.drag.active) {
            return;
        }

        const module = event.target.closest(
            '.sap-harmony-module'
        );

        if (!module) {
            return;
        }

        Harmony.drag.target =
            module.dataset.moduleId;

        const rect = module.getBoundingClientRect();

        const midpoint =
            rect.top + (rect.height / 2);

        Harmony.drag.position =
            event.clientY < midpoint
                ? 'before'
                : 'after';

        Harmony.showDropIndicator(module);

        console.log(
            'Pointer Move:',
            Harmony.drag
        );

    }
);

document.addEventListener(
    'pointerup',
    function () {

        if (!Harmony.drag.active) {
            return;
        }

        console.log(
            'Pointer Up:',
            Harmony.drag
        );

        if (
            Harmony.drag.source &&
            Harmony.drag.target &&
            Harmony.drag.source !== Harmony.drag.target
        ) {

            HarmonyAPI.moveModule(
                Harmony.drag.source,
                Harmony.drag.target,
                Harmony.drag.position
            );

        }

        Harmony.endDrag();

    }
);

	window.HarmonyAPI = HarmonyAPI;
        window.Harmony = Harmony;


});