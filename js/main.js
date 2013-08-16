;(function(){
  var bindUI = {
    init: function(){
      this.verbutton();
      this.contenteditable();
      this.delete();
    },
    verbutton : function(){
      $('.verbutton').bind('click', function(event){
        event.preventDefault(); 
        $(this).toggleClass('active');
        var _html = "Publish";
        var span = $(this).find('span');
        if($(this).hasClass('active')){
          span.html(_html+'ed');
        } else{
          span.html(_html);
        }
        return false;
      });
    },
    contenteditable:function(){
      $('[contenteditable]').bind('keyup', function(){
        contentEditor.create();
      });
    },
    delete:function(){
      $('.attn').bind('click', function(){
        contentEditor.delete();
      });
    }
  };
  var contentEditor = {
    create:function(){
      localStorage['data'] = JSON.stringify($('[contenteditable]').html());
    },
    read:function(){
      if(localStorage['data']){
        $('[contenteditable]').html(JSON.parse(localStorage['data']));
      }
    },
    delete:function(){
      localStorage['data'] = '';
    }
  };
  $(function(){
    bindUI.init();
    contentEditor.read();
  });
})(jQuery);

