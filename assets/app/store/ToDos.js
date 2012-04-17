Ext.define('ToDo.store.ToDos', {
    extend: 'Ext.data.Store',

    model: 'ToDo.model.ToDo',
    autoSync: false,
    pageSize: 25,
    autoLoad: {start: 0, limit: this.pageSize},

    proxy: {
        type: 'ajax',
        api: {
            read: 'todo/read',
            update: 'todo/update',
            destroy: 'todo/delete',
            create: 'todo/create'
        },
        reader: {
            type: 'json',
            root: 'todos',
            totalProperty: 'total',
            successProperty: 'success'
        },
        writer: {
            type: 'json',
            writeAllFields: true,
            successProperty: 'success'
        },
        listeners: {
            exception: function(proxy, response, operation){
                console.log(arguments);

                Ext.MessageBox.show({
                    title: 'REMOTE EXCEPTION',
                    msg: 'Error: ' + response.status + '<br />Message: ' + response.statusText,
                    icon: Ext.MessageBox.ERROR,
                    buttons: Ext.Msg.OK
                });
            }
        }
    }
});