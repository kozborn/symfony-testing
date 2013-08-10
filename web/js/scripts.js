//Start point for scripts
jQuery(document).ready(function($){

  
  var items = new ItemList();
  items.initialize();
  $(window).bind('resize',function(e){
    items.recalculate();
  })

});

var ItemList = function(){};

ItemList.prototype = {
  list : null,
  items : null,
  itemWidth : null,
  itemsPerRow: null,
  windowWidth: null,
  listWidth: null,
  itemMargin:10,
  
  initialize: function(){
    var self = this;
    this.list = $('ul#item-list');
    this.items = this.list.find('li');
    this.itemWidth = this.items.eq(0).outerWidth();
    this.windowWidth = $(window).outerWidth();
    this.recalculate();
  },
  
  recalculate: function(){
    this.windowWidth = $(window).outerWidth();
    this.itemsPerRow = Math.floor(this.windowWidth / this.itemWidth);
    this.setMargin(this.itemsPerRow);
    
  },
  
  setMargin: function(count){
    this.listWidth = count * (this.itemWidth+this.itemMargin);
    this.list.css('width',(this.listWidth)+'px');
  }
  
}
