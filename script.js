/**
 * ====================================================================
 * TripMate — Apple Interactive Experience (script.js)
 * Pengembang: Shafi (202410370110484)
 * ====================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
    // ----------------------------------------------------------------
    // 1. Apple Dynamic Island Notification Toast (Text-First)
    // ----------------------------------------------------------------
    const toast = document.getElementById('appleToast');

    const showToast = (message, title = 'Notifikasi', type = 'success') => {
        if (!toast) return;

        const toastTitle = toast.querySelector('.toast-title');
        const toastDesc = toast.querySelector('.toast-desc');
        const toastBadge = toast.querySelector('.toast-badge');

        if (toastTitle) toastTitle.textContent = title;
        if (toastDesc) toastDesc.textContent = message;

        if (toastBadge) {
            toastBadge.textContent = type === 'success' ? 'Sukses' : 'Info';
            toastBadge.className = type === 'success' 
                ? 'toast-badge text-[11px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-[#34c759] text-white flex-shrink-0'
                : 'toast-badge text-[11px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-[#0071e3] text-white flex-shrink-0';
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

            showToast(`Paket "${packageName}" telah dipilih. Mengarahkan ke form...`, 'Paket Dipilih', 'info');

            if (contactSection) {
                contactSection.scrollIntoView({ behavior: 'smooth' });
                if (pesanInput) {
                    pesanInput.value = `Halo Tim TripMate, saya tertarik untuk memesan paket: [${packageName}]. Mohon informasi ketersediaan jadwal serta langkah berikutnya. Terima kasih.`;
                    pesanInput.focus();
                }
            }
        });
    });

    // ----------------------------------------------------------------
    // 5. Destination Detail Navigation
    // ----------------------------------------------------------------
    const detailLinks = document.querySelectorAll('#destinasi article a');
    detailLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const card = link.closest('article');
            const destTitle = card.querySelector('h3') ? card.querySelector('h3').textContent.trim() : 'Destinasi';
            showToast(`Membuka rincian paket untuk ${destTitle}.`, destTitle, 'info');

            const paketSection = document.querySelector('#paket');
            if (paketSection) {
                paketSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // ----------------------------------------------------------------
    // 6. Contact Form Submission Handling
    // ----------------------------------------------------------------
    const contactForm = document.querySelector('#kontak form');

    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const submitButton = contactForm.querySelector('button[type="submit"]');
            const originalContent = submitButton ? submitButton.innerHTML : 'Kirim Pesan';

            if (submitButton) {
                submitButton.disabled = true;
                submitButton.textContent = 'Mengirim Pesan...';
            }

            // Simulate network turnaround
            setTimeout(() => {
                const nameInput = document.getElementById('nama');
                const senderName = nameInput && nameInput.value ? nameInput.value.trim() : 'Traveler';

                contactForm.reset();

                if (submitButton) {
                    submitButton.disabled = false;
                    submitButton.innerHTML = originalContent;
                }

                showToast(`Terima kasih, ${senderName}. Pesan kamu telah berhasil terkirim.`, 'Pesan Terkirim', 'success');
            }, 600);
        });
    }
});
