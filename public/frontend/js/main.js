// var mixer = mixitup('.mixImg');
// $(document).ready(function(){
//     var mixer = mixitup('.box_list');
    
// });
    
$(document).ready(function(){
    var containerEl = document.querySelector('[data-ref~="mixitup-container"]');
    
    var mixer = mixitup(containerEl, {
        selectors: {
            target: '[data-ref~="mixitup-target"]'
        }
    });
    });