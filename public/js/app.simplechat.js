var app = {};
//--------------
// Models
//--------------
app.Message = Backbone.Model.extend({
    defaults: {
        id: '', 
        person: '', 
        message: '',
        created_at: '',
        updated_at: ''
    }
});

//--------------
// Collections
//--------------
app.Chat = Backbone.Collection.extend({
    model: app.Message, 
    url: 'api/action'
});

// instance of the Collection
app.chat = new app.Chat();

//--------------
// Views
//--------------
app.MessageView = Backbone.View.extend({
    tagName: 'div', 
    template: _.template($('#message-template').html()), 
    render: function(){
        this.el.id = 'message-' + this.model.get('id');
        this.el.className = 'message-list message-' + this.model.get('person');
        this.$el.html(this.template(this.model.toJSON()));
        this.$input = this.$('.textarea-message');
        
        return this;
    },
    initialize: function(){
        this.model.on('change', this.render, this);
        this.model.on('destroy', this.remove, this);
    },      
    events: {
        'click .edit' : 'edit',
        'click .remove': 'clear',
        'blur .textarea-message': 'close'
    },
    clear: function(){
        this.model.destroy({
            data: {
                _token: $('input[name="_token"]').val()
            }, 
            processData: true
        });
    },
    close: function () {
        var value = this.$input.val();
        var trimmedValue = value.trim();

        if (!this.$el.hasClass('editing')) {
            return;
        }

        if (trimmedValue) {
            this.model.save({ message: trimmedValue, _token: $('input[name="_token"]').val() });

            if (value !== trimmedValue) {
                this.model.trigger('change');
            }
        } else {
            this.clear();
        }

        this.$el.removeClass('editing');
    },
    edit: function() {
        this.$el.addClass('editing');
        this.$input.focus();
    }   
});

app.ChatView = Backbone.View.extend({
    el: '#input-bar', 
    template: _.template($('#chat-template').html()), 
    initialize: function () {
        this.$el.html(this.template());
        app.chat.on('add', this.addOne, this);
        app.chat.on('reset', this.addAll, this);
        app.chat.fetch({reset: true});
    },
    events: {
        'click .button': 'sendMessage'
    },
    addOne: function(message){
        var view = new app.MessageView({model: message});
        $('#chat-screen').append(view.render().el);
        $('#chat-screen').scrollTop($('#chat-screen')[0].scrollHeight);
    },
    addAll: function(){                 
        $('#chat-screen').html('');
        app.chat.each(this.addOne);
    },
    sendMessage: function(e){
        var token = $('input[name="_token"]').val();
        if (e.target.id == 'btn-send-a') {
            if ( !$('#chat-a').val().trim() ) {
                return;
            }
            
            app.chat.create({
                id: 0,
                person: 'a',
                message: $('#chat-a').val().trim(),
                _token: token
            }, 
            {
                success: function(res) {
                    app.chat.fetch({reset: true});
                }
            });
            $('#chat-a').val('');            
        } else if (e.target.id == 'btn-send-b') {
            if ( !$('#chat-b').val().trim() ) {
                return;
            }
            
            app.chat.create({
                id: 0,
                person: 'b',
                message: $('#chat-b').val().trim(),
                _token: token 
            }, 
            {
                success: function(res) {
                    app.chat.fetch({reset: true});
                }
            });
            $('#chat-b').val('');
        }
    }
});