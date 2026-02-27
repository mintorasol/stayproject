document.addEventListener('DOMContentLoaded', function() {
    console.log('=== BOOKING SCRIPT LOADED ===');
    
    const checkinInput = document.getElementById('checkin-date');
    const checkoutInput = document.getElementById('checkout-date');
    const guestsInput = document.getElementById('guests-count');
    const nightsDisplay = document.getElementById('nights-count');
    const priceDisplay = document.getElementById('total-price');
    const bookingBtn = document.getElementById('booking-button');

    // Add inspection function accessible from console
    window.debugDates = function() {
        console.log('=== DATE DEBUG ===');
        console.log('Checkin input element:', checkinInput);
        console.log('Checkin .value:', checkinInput?.value);
        console.log('Checkin .defaultValue:', checkinInput?.defaultValue);
        console.log('Checkout input element:', checkoutInput);
        console.log('Checkout .value:', checkoutInput?.value);
        console.log('Checkout .defaultValue:', checkoutInput?.defaultValue);
    };

    console.log('Debug function available. Type: debugDates() in console');

    console.log('Elements found:', {
        checkinInput: !!checkinInput,
        checkoutInput: !!checkoutInput,
        guestsInput: !!guestsInput,
        nightsDisplay: !!nightsDisplay,
        priceDisplay: !!priceDisplay,
        bookingBtn: !!bookingBtn
    });

    if (!checkinInput || !checkoutInput || !nightsDisplay || !priceDisplay) {
        console.error('ERROR: Missing required DOM elements!');
        return;
    }

    const PRICE_PER_NIGHT = 450;

    function updatePrice() {
        try {
            // Get raw values from inputs
            const checkinRaw = (checkinInput?.value || '').trim();
            const checkoutRaw = (checkoutInput?.value || '').trim();

            console.log('🔄 updatePrice called');
            console.log('Input values:', { checkinRaw, checkoutRaw });

            // Reset display
            nightsDisplay.textContent = '0';
            priceDisplay.textContent = '0 DH';

            // Validate we have both dates
            if (!checkinRaw || !checkoutRaw) {
                console.log('❌ Missing one or both dates');
                return;
            }

            // Parse dates - handle MM/DD/YYYY or YYYY-MM-DD formats
            function parseDate(dateStr) {
                dateStr = dateStr.trim();
                
                let year, month, day;
                
                if (dateStr.includes('/')) {
                    // MM/DD/YYYY format
                    const [m, d, y] = dateStr.split('/').map(s => s.trim());
                    year = parseInt(y);
                    month = parseInt(m);
                    day = parseInt(d);
                } else if (dateStr.includes('-')) {
                    // YYYY-MM-DD format
                    const [y, m, d] = dateStr.split('-').map(s => s.trim());
                    year = parseInt(y);
                    month = parseInt(m);
                    day = parseInt(d);
                } else {
                    return null;
                }

                // Validate values
                if (isNaN(year) || isNaN(month) || isNaN(day)) {
                    return null;
                }
                if (year < 1900 || year > 2100) {
                    return null;
                }
                if (month < 1 || month > 12) {
                    return null;
                }
                if (day < 1 || day > 31) {
                    return null;
                }

                // Return Date object in UTC
                const date = new Date(year, month - 1, day);
                console.log(`Parsed "${dateStr}" → ${year}-${String(month).padStart(2, '0')}-${String(day).padStart(2, '0')} → ${date.toISOString()}`);
                return date;
            }

            const checkinDate = parseDate(checkinRaw);
            const checkoutDate = parseDate(checkoutRaw);

            if (!checkinDate) {
                console.log('❌ Invalid checkin date format:', checkinRaw);
                return;
            }

            if (!checkoutDate) {
                console.log('❌ Invalid checkout date format:', checkoutRaw);
                return;
            }

            console.log('✓ Dates parsed:', { 
                checkin: checkinDate.toISOString(), 
                checkout: checkoutDate.toISOString() 
            });

            // Validate checkout is after checkin
            if (checkoutDate <= checkinDate) {
                console.log('❌ Checkout date must be after checkin date');
                return;
            }

            // Calculate nights
            const daysDiff = (checkoutDate - checkinDate) / (1000 * 60 * 60 * 24);
            const nights = Math.ceil(daysDiff);
            const total = nights * PRICE_PER_NIGHT;

            console.log('✓ Calculation complete:', { nights, total });

            // Update display
            nightsDisplay.textContent = nights;
            priceDisplay.textContent = total.toLocaleString('fr-FR') + ' DH';
            
            console.log('✓ Display updated');
        } catch (e) {
            console.error('❌ Exception in updatePrice:', e.message, e.stack);
        }
    }

    // Date listeners - multiple events to ensure calculation triggers
    console.log('Attaching event listeners to date inputs...');
    
    // Auto-format date inputs as user types
    function autoFormatDate(input) {
        // Remove non-numeric characters
        let value = input.value.replace(/\D/g, '');
        
        // Auto-format as YYYY-MM-DD
        if (value.length >= 5) {
            // Format: YYYY-MM-DD
            value = value.slice(0, 4) + '-' + value.slice(4, 6) + '-' + value.slice(6, 8);
        } else if (value.length >= 3) {
            // Format: YYYY-MM
            value = value.slice(0, 4) + '-' + value.slice(4, 6);
        }
        
        input.value = value;
    }
    
    if (checkinInput) {
        const attachCheckIn = () => {
            console.log('Attaching checkin listeners');
            checkinInput.addEventListener('input', (e) => { 
                autoFormatDate(e.target);
                console.log('CHECKIN: input event, formatted value:', e.target.value);
                updatePrice(); 
            });
            checkinInput.addEventListener('change', () => { console.log('CHECKIN: change event'); updatePrice(); });
            checkinInput.addEventListener('blur', () => { console.log('CHECKIN: blur event'); updatePrice(); });
        };
        attachCheckIn();
    }
    
    if (checkoutInput) {
        const attachCheckOut = () => {
            console.log('Attaching checkout listeners');
            checkoutInput.addEventListener('input', (e) => { 
                autoFormatDate(e.target);
                console.log('CHECKOUT: input event, formatted value:', e.target.value);
                updatePrice(); 
            });
            checkoutInput.addEventListener('change', () => { console.log('CHECKOUT: change event'); updatePrice(); });
            checkoutInput.addEventListener('blur', () => { console.log('CHECKOUT: blur event'); updatePrice(); });
        };
        attachCheckOut();
    }

    // Also monitor for any value changes via polling
    console.log('Starting polling interval...');
    const pollInterval = setInterval(() => {
        const currentCheckin = checkinInput?.value || '';
        const currentCheckout = checkoutInput?.value || '';
        if (currentCheckin && currentCheckout) {
            console.log('📊 Polling tick - both dates present, updating...');
            updatePrice();
        }
    }, 1000);

    // Initial calculation on page load
    console.log('Scheduling initial calculation...');
    setTimeout(() => {
        console.log('Running initial calculation...');
        updatePrice();
    }, 200);

    // Thank you modal
    function showThankYouModal(checkin, checkout, guests, email, total) {
        const backdrop = document.createElement('div');
        backdrop.style.cssText = 'position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.6);display:flex;align-items:center;justify-content:center;z-index:10000;';

        const modal = document.createElement('div');
        modal.style.cssText = 'background:white;border-radius:16px;padding:40px 30px;max-width:500px;text-align:center;box-shadow:0 10px 40px rgba(0,0,0,0.2);';

        modal.innerHTML = `
            <div style="font-size:60px;margin-bottom:20px;">✓</div>
            <h2 style="color:#ff6a00;font-size:28px;margin-bottom:10px;font-family:'Poppins',sans-serif;">Réservation confirmée!</h2>
            <p style="color:#666;font-size:16px;margin-bottom:20px;">Merci! Votre réservation a été reçue.</p>
            
            <div style="background:#f5f5f5;padding:20px;border-radius:10px;margin:20px 0;text-align:left;font-size:14px;">
                <p style="margin:8px 0;"><strong>Arrivée:</strong> ${checkin}</p>
                <p style="margin:8px 0;"><strong>Départ:</strong> ${checkout}</p>
                <p style="margin:8px 0;"><strong>Personnes:</strong> ${guests}</p>
                <p style="margin:8px 0;"><strong>Total:</strong> ${total}</p>
            </div>
            
            <p style="color:#333;font-size:15px;margin-top:20px;"><strong>Nous vous contacterons à:</strong><br><strong>${email}</strong></p>
            
            <button onclick="this.closest('div').parentElement.remove()" style="margin-top:25px;padding:12px 30px;background:#ff6a00;color:white;border:none;border-radius:8px;font-size:15px;font-weight:600;cursor:pointer;font-family:'Poppins',sans-serif;">Fermer</button>
        `;

        backdrop.appendChild(modal);
        document.body.appendChild(backdrop);
        backdrop.onclick = (e) => e.target === backdrop && backdrop.remove();
    }

    // Book button
    bookingBtn?.addEventListener('click', function(e) {
        e.preventDefault();

        const checkin = checkinInput.value;
        const checkout = checkoutInput.value;
        const email = document.getElementById('guest-email').value;
        const phone = document.getElementById('guest-phone').value;
        const guests = guestsInput.value;
        const nights = nightsDisplay.textContent;
        const total = priceDisplay.textContent;

        if (!checkin || !checkout || !email) {
            alert('Remplir tous les champs requis');
            return;
        }

        const aptTitle = document.getElementById('apartment-title')?.value || '';

        // Show thank you modal immediately
        showThankYouModal(checkin, checkout, guests, email, total);
        
        // Reset form
        checkinInput.value = '';
        checkoutInput.value = '';
        document.getElementById('guest-email').value = '';
        document.getElementById('guest-phone').value = '';
        guestsInput.value = '1';
        updatePrice();

        // Send email in background (don't wait for response)
        const formData = new FormData();
        formData.append('email', email);
        formData.append('apartment', aptTitle);
        formData.append('checkin-date', checkin);
        formData.append('checkout-date', checkout);
        formData.append('guests', guests);
        formData.append('phone', phone || 'N/A');
        formData.append('nights', nights);
        formData.append('total', total);

        console.log('Sending booking email in background...');
        
        // Send to Formspree (fire and forget)
        fetch('https://formspree.io/f/mgoldjzg', { 
            method: 'POST', 
            body: formData
        })
            .then(response => {
                if (response.ok) {
                    console.log('✓ Email sent successfully');
                } else {
                    console.warn('⚠️ Email send returned status:', response.status);
                }
            })
            .catch(error => {
                console.warn('⚠️ Email send failed (offline?):', error.message);
                // Still show thank you to user since they already see the modal
            });
    });

    console.log('Form ready');
});
