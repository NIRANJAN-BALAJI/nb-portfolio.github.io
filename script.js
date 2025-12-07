document.querySelector('.copy-btn').addEventListener('click', function (e) {
            e.preventDefault();
            const email = 'niranjankrishna0910@gmail.com';
            navigator.clipboard.writeText(email).then(() => {
                const originalText = this.innerText;
                this.innerText = 'Copied!';
                this.style.background = '#4CAF50'; 
                this.style.color = 'white';

                setTimeout(() => {
                    this.innerText = originalText;
                    this.style.background = ''; 
                    this.style.color = '';
                }, 2000);
            }).catch(err => {
                console.error('Failed to copy text: ', err);
            });
        });

// Tooltip functionality for Project Icons
$(document).ready(function() {
    const $tooltip = $('<div class="tool-toast"></div>').appendTo('body');

    $('.project-icons .icon-circle').hover(
        function(e) {
            const name = $(this).data('name');
            if (!name) return;

            $tooltip.text(name).addClass('visible');
            
            // Position tooltip above the icon
            const offset = $(this).offset();
            const width = $(this).outerWidth();
            const tooltipWidth = $tooltip.outerWidth();
            
            $tooltip.css({
                top: offset.top - $tooltip.outerHeight() - 10,
                left: offset.left + (width / 2) - (tooltipWidth / 2)
            });
        },
        function() {
            $tooltip.removeClass('visible');
        }
    );
});