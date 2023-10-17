$(document).ready(function(){
    function toInt(val, min, max){
        val=(val*1 || 0);
        val=(val<0 ? Math.ceil(val) : Math.floor(val));
    
        min*=1;
        max*=1;
    
        min=((Number.isNaN(min) ? -Infinity : min) || 0);
        max=((Number.isNaN(max) ? Infinity : max) || 0);
    
        return Math.min(Math.max(val, min), max);
    }

    $('.type-rating').keyup(function(ev){
        var val = $(this).val();
        var intVal = toInt(val, 1, 5)
        $(this).val(intVal);
    });
    $('.the-colorpicker').colorpicker()
});