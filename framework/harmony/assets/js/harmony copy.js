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

            targetColumnId: null,

            selectedPlaceholder: null,

            addModuleMode: false,

            drag: {
                active: false,

                mode: null,

                source: null,

                moduleType: null,

                target: null,

                position: 'before'
	        },

            libraryDrag: {

                active: false,

                moduleType: null,

                ghost: null

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

                if (!selection || !selection.id) {
                    return this.renderEmptyInspector();
                }

                switch (selection.type) {

                    case 'heading':
                        return this.renderHeadingInspector(selection);

                    default:
                        return this.renderGenericInspector(selection);

                }

            },

    renderEmptyInspector() {

        const inspector = document.getElementById(
            'sap-harmony-inspector-content'
        );

        if (!inspector) {
            return;
        }

        inspector.innerHTML = `
            <p>Select a module to edit its properties.</p>
        `;

    },

    renderGenericInspector(selection) {

    const inspector = document.getElementById(
        'sap-harmony-inspector-content'
    );

    if (!inspector) {
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

            renderHeadingInspector(selection) {

                const inspector = document.getElementById(
                    'sap-harmony-inspector-content'
                );

                if (!inspector) {
                    return;
                }

                const level = selection.level ?? 'h2';
                const alignment = selection.alignment ?? 'left';

                inspector.innerHTML = `
        <div class="sap-inspector-group">

            <h3>Heading Settings</h3>

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

    <label>Heading Level</label>

    <select id="sap-inspector-level">

    <option value="h1" ${level === 'h1' ? 'selected' : ''}>H1</option>
    <option value="h2" ${level === 'h2' ? 'selected' : ''}>H2</option>
    <option value="h3" ${level === 'h3' ? 'selected' : ''}>H3</option>
    <option value="h4" ${level === 'h4' ? 'selected' : ''}>H4</option>
    <option value="h5" ${level === 'h5' ? 'selected' : ''}>H5</option>
    <option value="h6" ${level === 'h6' ? 'selected' : ''}>H6</option>

</select>

</div>

<div class="sap-inspector-group">

    <label>Alignment</label>

<select id="sap-inspector-alignment">

    <option value="left" ${alignment === 'left' ? 'selected' : ''}>Left</option>
    <option value="center" ${alignment === 'center' ? 'selected' : ''}>Center</option>
    <option value="right" ${alignment === 'right' ? 'selected' : ''}>Right</option>

</select>

</div>

        <div class="sap-inspector-group">

            <button
                type="button"
                id="sap-save-module"
                class="button button-primary"
            >
                Save Heading
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

                        const content = '';

                        const level = document.getElementById(
                            'sap-inspector-level'
                        ).value;

                        const alignment = document.getElementById(
                            'sap-inspector-alignment'
                        ).value;

                        HarmonyAPI.saveModule(
                            selection.id,
                            title,
                            content,
                            {
                                level,
                                alignment
                            }
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

    this.dropIndicator.style.display = 'block';

    if (this.drag.position === 'inside') {

        this.dropIndicator.style.top =
            (rect.top - canvasRect.top) + 'px';

        this.dropIndicator.style.left =
            (rect.left - canvasRect.left) + 'px';

        this.dropIndicator.style.width =
            rect.width + 'px';

        this.dropIndicator.style.height =
            rect.height + 'px';

        this.dropIndicator.style.border =
            '2px dashed #7c3aed';

    } else {

        let top =
            rect.top - canvasRect.top;

        if (this.drag.position === 'before') {
            top -= 4;
        } else {
            top += rect.height - 2;
        }

        this.dropIndicator.style.top =
            top + 'px';

        this.dropIndicator.style.left = '0';

        this.dropIndicator.style.width = '100%';

        this.dropIndicator.style.height = '2px';

        this.dropIndicator.style.border = 'none';

    }

},

hideDropIndicator() {

    if (this.dropIndicator) {
        this.dropIndicator.style.display = 'none';
    }

},
    getModuleAtPointer(x, y) {

    const elements = document.elementsFromPoint(x, y);

    for (const element of elements) {

        if (
            element.classList &&
            element.classList.contains(
                'sap-harmony-drop-indicator'
            )
        ) {
            continue;
        }

        const module = element.closest?.(
            '.sap-harmony-module'
        );

        if (module) {
            return module;
        }

    }

    return null;

    },
    
	beginDrag(sourceId) {

        this.drag.active = true;
        this.drag.source = sourceId;
        this.drag.target = null;
        this.drag.position = 'before';

        const module = document.querySelector(
            '[data-module-id="' + sourceId + '"]'
        );

        if (module) {
        module.classList.add('is-dragging');
        }

    },

    beginLibraryDrag(moduleType) {

        this.drag.active = true;

        this.drag.mode = 'create';

        this.drag.moduleType = moduleType;

        this.drag.source = null;

        this.drag.target = null;

        this.drag.position = 'inside';

        console.log(
            'Library Drag:',
            this.drag
            );

    },

    endDrag() {

        document
             .querySelector(
                    '.sap-harmony-module.is-dragging'
                )
            ?.classList.remove(
                'is-dragging'
            );

            this.drag.active = false;

            this.drag.mode = null;

            this.drag.source = null;

            this.drag.moduleType = null;

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

    createLayout(layout) {

    this.sendCommand(
        'create_layout',
        {
            layout: layout
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
            'CREATE_LAYOUT failed:',
            error
        );

    });

},
    
    addModule(type) {

	this.sendCommand(
		'add_module',
		{
            type: type,
            parent: Harmony.targetColumnId
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

            Harmony.addModuleMode = false;

            Harmony.selectedPlaceholder = null;

            document
                .querySelectorAll('.sap-module-target')
                .forEach(column => {
                    column.classList.remove('sap-module-target');
                });

            const title = document.getElementById(
                'sap-harmony-library-title'
            );

            if (title) {
                title.textContent = 'Modules';
            }

            document
                .querySelectorAll('.sap-harmony-module-group')
                .forEach(group => {

                    group.style.display = '';

                    let next = group.nextElementSibling;

                    while (
                        next &&
                        !next.classList.contains(
                            'sap-harmony-module-group'
                        )
                    ) {

                        next.style.display = '';

                        next = next.nextElementSibling;

                    }

                });

            addButton.textContent = '+ Add Module';

            document.body.classList.remove(
                'sap-add-module-mode'
            );

            console.log(
                'Add Module Mode:',
                Harmony.addModuleMode
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

        saveModule(
            id,
            title,
            content,
            properties = {}
        ) {

        this.sendCommand(
            'save_module',
        {
            id: id,
            title: title,
            content: content,
            properties: properties
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
    const moduleLibrary = document.querySelector('.sap-harmony-library');
	const newButton = document.querySelector('.sap-new-document');
	const deleteButton = document.querySelector('.sap-delete-module');
	Harmony.dropIndicator = document.querySelector(
    '.sap-harmony-drop-indicator'
);

if (Harmony.dropIndicator) {

    Harmony.dropIndicator.style.display = 'none';

}

    if (addButton) {

        addButton.addEventListener(
            'click',
            function () {

                Harmony.addModuleMode = true;

                addButton.textContent = '✓ Choose a Location';

                document.body.classList.add(
                    'sap-add-module-mode'
                );

                console.log(
                    'Add Module Mode:',
                    Harmony.addModuleMode
                );

                moduleLibrary?.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

            }
        );

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

        const placeholder = event.target.closest(
            '.sap-harmony-empty-column'
        );

        if (placeholder) {

            document
                .querySelectorAll('.sap-harmony-empty-column')
                .forEach(column => {
                    column.classList.remove('sap-module-target');
                });

            placeholder.classList.add('sap-module-target');

            Harmony.selectedPlaceholder = placeholder;

            Harmony.targetColumnId =
                placeholder.dataset.columnId;

            const title = document.getElementById(
                'sap-harmony-library-title'
            );

            if (title) {
                title.textContent = 'Choose a Module';
            }

            document
                .querySelectorAll('.sap-harmony-module-group')
                .forEach(group => {

                    if (
                        group.textContent.trim().toUpperCase() === 'LAYOUT'
                    ) {

                        group.style.display = 'none';

                        let next = group.nextElementSibling;

                        while (
                            next &&
                            !next.classList.contains(
                                'sap-harmony-module-group'
                            )
                        ) {

                            next.style.display = 'none';

                            next = next.nextElementSibling;

                        }

                    }

                });

            console.log(
                'Target Column:',
                Harmony.targetColumnId
            );

            return;

        }

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

	        const type = card.dataset.module;

            const layouts = [
                'single',
                'two-column',
                'three-column',
                'four-column',
                'sidebar-left',
                'sidebar-right'
            ];

            if (layouts.includes(type)) {

                HarmonyAPI.createLayout(type);

            } else {

                HarmonyAPI.addModule(type);

            }

		}
        
	});

	document.addEventListener(
	'pointerdown',
	function (event) {

        const card = event.target.closest(
            '.sap-harmony-module-card'
        );

        console.log(
            'Pointer target:',
            event.target
        );

        console.log(
            'Library card:',
            card
        );

        if (card) {

            Harmony.beginLibraryDrag(
                card.dataset.module
            );

            document.body.style.userSelect = 'none';

            console.log(
                'Library Pointer Down:',
                Harmony.drag
            );

            return;

        }

        const placeholder = event.target.closest(
            '.sap-harmony-empty-column'
        );

        if (placeholder) {
            return;
        }

		const module = event.target.closest(
			'.sap-harmony-module'
		);

		if (!module) {
			return;
		}

		Harmony.beginDrag(
			module.dataset.moduleId
		);

		document.body.style.userSelect = 'none';

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

        if (Harmony.drag.mode === 'create') {

            const elements = document.elementsFromPoint(
                event.clientX,
                event.clientY
            );

            let column = null;

            for (const element of elements) {

                column = element.closest?.(
                    '.sap-harmony-empty-column'
                );

                if (column) {
                    break;
                }

            }

            if (!column) {

                Harmony.drag.target = null;
                Harmony.targetColumnId = null;

                Harmony.hideDropIndicator();

                return;

            }

            Harmony.drag.target =
                column.dataset.columnId;

            Harmony.targetColumnId =
                column.dataset.columnId;

            Harmony.drag.position = 'inside';

            Harmony.showDropIndicator(column);

            return;

        }

        const module = Harmony.getModuleAtPointer(
            event.clientX,
            event.clientY
        );

        if (!module) {
            return;
        }

        Harmony.drag.target =
            module.dataset.moduleId;
			console.log(
                'Target:',
                module.dataset.moduleId
            );

        if (
    module.dataset.moduleId ===
    Harmony.drag.source
) {

    Harmony.drag.target = null;

    Harmony.hideDropIndicator();

    return;

}

const modules = Array.from(
    document.querySelectorAll(
        '.sap-harmony-module'
    )
);

const sourceModule = document.querySelector(
    '[data-module-id="' +
    Harmony.drag.source +
    '"]'
);

const sourceIndex =
    modules.indexOf(sourceModule);

const targetIndex =
    modules.indexOf(module);

if (
    sourceIndex === -1 ||
    targetIndex === -1
) {
    return;
}

const rect = module.getBoundingClientRect();

const pointerOffset =
    event.clientY - rect.top;

const ratio =
    pointerOffset / rect.height;

if (ratio < 0.33) {

    Harmony.drag.position = 'before';

} else if (ratio > 0.66) {

    Harmony.drag.position = 'after';

} else {

    Harmony.drag.position = 'inside';

}

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
        console.log({
            source: Harmony.drag.source,
            target: Harmony.drag.target,
            position: Harmony.drag.position
        });
            HarmonyAPI.moveModule(
                Harmony.drag.source,
                Harmony.drag.target,
                Harmony.drag.position
            );

        }

		document.body.style.userSelect = '';

		Harmony.hideDropIndicator();

        Harmony.endDrag();

    }
);


	window.HarmonyAPI = HarmonyAPI;
        window.Harmony = Harmony;

        

});

