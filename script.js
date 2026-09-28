/**
 * ====================================================================
 * TripMate — Apple Interactive Experience (script.js)
 * Pengembang: Shafi (202410370110484)
 * ====================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
    // ----------------------------------------------------------------
    // 1. Apple Dynamic Island Notification Toast
    // ----------------------------------------------------------------
    const toast = document.getElementById('appleToast');

    const showToast = (message, title = 'Notifikasi', type = 'success') => {
        if (!toast) return;

        const toastTitle = toast.querySelector('.toast-title');
        const toastDesc = toast.querySelector('.toast-desc');
        const toastIcon = toast.querySelector('.toast-icon');

        if (toastTitle) toastTitle.textContent = title;
        if (toastDesc) toastDesc.textContent = message;

        // Visual icon indicator based on type
        if (toastIcon) {
            if (type === 'success') {
                toastIcon.className = 'toast-icon w-7 h-7 rounded-full bg-[#34c759] text-white flex items-center justify-center flex-shrink-0';
                toastIcon.innerHTML = `
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 6L9 17l-5-5"/>
                    </svg>
                `;
            } else {
                toastIcon.className = 'toast-icon w-7 h-7 rounded-full bg-[#0071e3] text-white flex items-center justify-center flex-shrink-0';
                toastIcon.innerHTML = `
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                `;
            }
        }

        // Show Dynamic Island
        toast.classList.remove('-translate-y-32', 'opacity-0', 'scale-90');
        toast.classList.add('translate-y-0', 'opacity-100', 'scale-100');

        // Auto hide after 4 seconds
        clearTimeout(toast._timeout);
        toast._timeout = setTimeout(() => {
            toast.classList.remove('translate-y-0', 'opacity-100', 'scale-100');
            toast.classList.add('-translate-y-32', 'opacity-0', 'scale-90');
        }, 4000);
    };

    // ----------------------------------------------------------------
    // 2. Frosted Navbar Scroll Elevation
    // ----------------------------------------------------------------
    const header = document.querySelector('header');
    
    const handleScroll = () => {
        if (!header) return;
        if (window.scrollY > 20) {
            header.classList.add('shadow-sm', 'bg-white/90');
            header.classList.remove('bg-white/80');
        } else {
            header.classList.remove('shadow-sm', 'bg-white/90');
            header.classList.add('bg-white/80');
        }
    };

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();

    // ----------------------------------------------------------------
    // 3. Active Navigation Spy on Scroll
    // ----------------------------------------------------------------
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('nav ul a');

    const highlightActiveNav = () => {
        const scrollPosition = window.scrollY + 120;

        sections.forEach(section => {
            const top = section.offsetTop;
            const height = section.offsetHeight;
            const id = section.getAttribute('id');

            if (scrollPosition >= top && scrollPosition < top + height) {
                navLinks.forEach(link => {
                    const href = link.getAttribute('href');
                    if (href === `#${id}`) {
                        link.classList.add('text-[#1d1d1f]', 'bg-black/[0.05]', 'font-semibold');
                        link.classList.remove('text-[#6e6e73]', 'font-medium');
                    } else {
                        link.classList.remove('text-[#1d1d1f]', 'bg-black/[0.05]', 'font-semibold');
                        link.classList.add('text-[#6e6e73]', 'font-medium');
                    }
                });
            }
        });
    };

    window.addEventListener('scroll', highlightActiveNav, { passive: true });

    // ----------------------------------------------------------------
    // 4. Interactive Package Selection & Form Auto-fill
    // ----------------------------------------------------------------
    const packageButtons = document.querySelectorAll('#paket article a');
    const contactSection = document.querySelector('#kontak');
    const pesanInput = document.getElementById('pesan');

    packageButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const card = button.closest('article');
            const titleElement = card ? card.querySelector('h3') : null;
            const packageName = titleElement ? titleElement.textContent.trim() : 'Paket Wisata';

            showToast(`Paket "${packageName}" telah dipilih! Mengarahkan ke form pemesanan...`, 'Paket Dipilih', 'info');

            if (contactSection) {
                contactSection.scrollIntoView({ behavior: 'smooth' });
                if (pesanInput) {
                    pesanInput.value = `Halo Tim TripMate, saya tertarik untuk memesan paket: [${packageName}]. Mohon informasi ketersediaan jadwal serta langkah berikutnya. Terima kasih!`;
                    pesanInput.focus();
                }
            }
        });
    });

    // ----------------------------------------------------------------
    // 5. Destination "Detail" Quick Modal Preview
    // ----------------------------------------------------------------
    const detailLinks = document.querySelectorAll('#destinasi article a');
    detailLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const card = link.closest('article');
            const destTitle = card.querySelector('h3') ? card.querySelector('h3').textContent.trim() : 'Destinasi';
            showToast(`Membuka rincian lengkap untuk ${destTitle}. Informasi paket tersedia di bawah.`, destTitle, 'info');

            const paketSection = document.querySelector('#paket');
            if (paketSection) {
                paketSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // ----------------------------------------------------------------
    // 6. Contact Form Submission Handling with Tactile Feedback
    // ----------------------------------------------------------------
    const contactForm = document.querySelector('#kontak form');

    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const submitButton = contactForm.querySelector('button[type="submit"]');
            const originalContent = submitButton ? submitButton.innerHTML : 'Kirim Pesan';

            if (submitButton) {
                submitButton.disabled = true;
                submitButton.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                    </svg>
                    <span>Mengirim...</span>
                `;
            }

            // Simulate smooth network delay
            setTimeout(() => {
                const nameInput = document.getElementById('nama');
                const senderName = nameInput && nameInput.value ? nameInput.value.trim() : 'Traveler';

                contactForm.reset();

                if (submitButton) {
                    submitButton.disabled = false;
                    submitButton.innerHTML = originalContent;
                }

                showToast(`Terima kasih, ${senderName}! Pesan kamu telah diterima oleh tim TripMate.`, 'Pesan Terkirim', 'success');
            }, 750);
        });
    }
});
