/*
 * Un affichage d'actus simple
 *
 * @nom     newsticker (ou newsTicker)
 * @param    delay      Delai (en millisecondes) entre les iterations. Par default 4 secondes (4000ms)
 *
 */
jQuery.fn.newsTicker = jQuery.fn.newsticker = function(delay)
{
    return this.each(
        function()
        {
            if(this.nodeName.toLowerCase()!= "ul") return;
            delay = delay || 4000;
            var self = this;
            self.items = jQuery("li", self);
            // cache tous les items (sauf le premier)
            self.items.not(":eq(0)").hide().end();
            //  item courant
            self.currentitem = 0;
            var doTick = function()
            {
                jQuery.newsticker(self);
            }
            setInterval(doTick,delay);
        }
    )
        .addClass("newsticker")
        .hover(
            function()
            {
                // se met en pause si on passe la souris dessus
                this.pause = true;
            },
            function()
            {
                // stop la pause quand on enleve la souris de l'item
                this.pause = false;
            }
        );
}
jQuery.newsticker = function(el)
{
    // retour si la souris passe dessus
    if(el.pause) return;
    // cache l'item courant
    jQuery(el.items[el.currentitem]).fadeOut("slow",
        function()
        {
            jQuery(this).hide();
            // passe a l'objet suivant et le montre
            el.currentitem = ++el.currentitem % (el.items.size());
            jQuery(el.items[el.currentitem]).fadeIn("slow");
        }
    );
}
$(document).ready(
    function()
    {
        $("#news").newsTicker();
    }
);
