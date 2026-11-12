/**
 * Galeri Karya Mahasiswa - Interactive Scripts
 * Handles Live Search, Category Filtering, and Appreciation Form Validation
 */

document.addEventListener('DOMContentLoaded', function () {
    initGalleryFilterAndSearch();
    initAppreciationForm();
    initSmoothScroll();
});

/**
 * Live Search & Category Filter
 */
function initGalleryFilterAndSearch() {
    const searchInput = document.getElementById('search-karya');
    const clearSearchBtn = document.getElementById('clear-search-btn');
    const categoryBtns = document.querySelectorAll('.category-btn, .filter-pill-btn');
    const karyaCards = document.querySelectorAll('.karya-item-col');
    const emptyState = document.getElementById('empty-state');
    const countDisplay = document.getElementById('karya-count-display');
    const resetAllBtn = document.getElementById('reset-all-btn');

    if (!karyaCards.length) return;

    let currentCategory = 'all';
    let searchQuery = '';

    // Filter Logic
    function applyFilterAndSearch() {
        let visibleCount = 0;

        karyaCards.forEach(card => {
            const cardCategory = card.getAttribute('data-category') || '';
            const cardTitle = (card.getAttribute('data-title') || '').toLowerCase();
            const cardCreator = (card.getAttribute('data-creator') || '').toLowerCase();
            const cardDesc = (card.getAttribute('data-desc') || '').toLowerCase();

            // Match Category
            const matchesCategory = (currentCategory === 'all' || cardCategory === currentCategory);

            // Match Search
            const normalizedQuery = searchQuery.trim().toLowerCase();
            const matchesSearch = !normalizedQuery || 
                cardTitle.includes(normalizedQuery) || 
                cardCreator.includes(normalizedQuery) || 
                cardDesc.includes(normalizedQuery);

            if (matchesCategory && matchesSearch) {
                card.style.display = 'block';
                // Trigger smooth appearance
                card.style.opacity = '1';
                card.style.transform = 'scale(1)';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Update Counter
        if (countDisplay) {
            countDisplay.textContent = `Menampilkan ${visibleCount} dari ${karyaCards.length} karya`;
        }

        // Toggle Empty State
        if (emptyState) {
            if (visibleCount === 0) {
                emptyState.style.display = 'block';
            } else {
                emptyState.style.display = 'none';
            }
        }

        // Toggle clear search button visibility
        if (clearSearchBtn) {
            clearSearchBtn.style.display = searchQuery ? 'block' : 'none';
        }
    }

    // Event: Live Search Input
    if (searchInput) {
        searchInput.addEventListener('input', function (e) {
            searchQuery = e.target.value;
            applyFilterAndSearch();
        });
    }

    // Event: Clear Search Button
    if (clearSearchBtn) {
        clearSearchBtn.addEventListener('click', function () {
            if (searchInput) {
                searchInput.value = '';
                searchQuery = '';
                searchInput.focus();
                applyFilterAndSearch();
            }
        });
    }

    // Event: Category Buttons Click
    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            categoryBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            currentCategory = this.getAttribute('data-category') || 'all';
            applyFilterAndSearch();
        });
    });

    // Event: Reset Filter button on Empty State
    if (resetAllBtn) {
        resetAllBtn.addEventListener('click', function () {
            if (searchInput) {
                searchInput.value = '';
                searchQuery = '';
            }
            currentCategory = 'all';
            categoryBtns.forEach(b => {
                if (b.getAttribute('data-category') === 'all') {
                    b.classList.add('active');
                } else {
                    b.classList.remove('active');
                }
            });
            applyFilterAndSearch();
        });
    }
}

/**
 * Appreciation Form Handling & Validation
 */
function initAppreciationForm() {
    const form = document.getElementById('form-apresiasi');
    if (!form) return;

    const nameInput = document.getElementById('apresiasi-nama');
    const emailInput = document.getElementById('apresiasi-email');
    const messageInput = document.getElementById('apresiasi-pesan');
    const submitBtn = document.getElementById('btn-kirim-apresiasi');
    const successToast = document.getElementById('apresiasi-success-alert');
    const appreciationList = document.getElementById('apresiasi-dynamic-list');
    const counterBadge = document.getElementById('detail-apresiasi-count');

    // Email regex validator
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Clear validation error on input
    [nameInput, emailInput, messageInput].forEach(input => {
        if (!input) return;
        input.addEventListener('input', function () {
            this.classList.remove('is-invalid');
        });
    });

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        let isValid = true;

        // Validate Name
        if (!nameInput.value.trim() || nameInput.value.trim().length < 2) {
            nameInput.classList.add('is-invalid');
            isValid = false;
        } else {
            nameInput.classList.remove('is-invalid');
        }

        // Validate Email
        if (!emailInput.value.trim() || !emailPattern.test(emailInput.value.trim())) {
            emailInput.classList.add('is-invalid');
            isValid = false;
        } else {
            emailInput.classList.remove('is-invalid');
        }

        // Validate Message
        if (!messageInput.value.trim() || messageInput.value.trim().length < 5) {
            messageInput.classList.add('is-invalid');
            isValid = false;
        } else {
            messageInput.classList.remove('is-invalid');
        }

        if (!isValid) {
            return;
        }

        // Animate Button Loading
        const originalBtnHtml = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
            Mengirim apresiasi...
        `;

        setTimeout(function () {
            // Restore button
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnHtml;

            // Show Success Notification
            if (successToast) {
                successToast.style.display = 'block';
                successToast.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }

            // Increment visual appreciation count
            if (counterBadge) {
                let currentCount = parseInt(counterBadge.textContent.replace(/[^0-9]/g, '')) || 0;
                counterBadge.textContent = (currentCount + 1);
            }

            // Dynamically append new appreciation card to the list
            if (appreciationList) {
                const now = new Date();
                const timeString = 'Baru saja';
                const initial = nameInput.value.trim().charAt(0).toUpperCase();

                const newCard = document.createElement('div');
                newCard.className = 'p-3 bg-neutral-surface border border-neutral rounded-2 mb-2';
                newCard.innerHTML = `
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <div class="d-flex align-items-center gap-2">
                            <div class="bento-creator-avatar" style="width: 24px; height: 24px; font-size: 0.7rem;">${escapeHtml(initial)}</div>
                            <span class="fw-bold text-dark small">${escapeHtml(nameInput.value.trim())}</span>
                        </div>
                        <span class="badge bg-white text-secondary border border-neutral" style="font-size: 0.68rem;">${timeString}</span>
                    </div>
                    <p class="text-secondary small mb-0">${escapeHtml(messageInput.value.trim())}</p>
                `;
                appreciationList.insertBefore(newCard, appreciationList.firstChild);
            }

            // Reset Form fields
            form.reset();

            // Auto-hide alert after 7 seconds
            setTimeout(() => {
                if (successToast) {
                    successToast.style.display = 'none';
                }
            }, 7000);
        }, 600);
    });
}

/**
 * Smooth scrolling for anchors like #katalog and #tentang
 */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    e.preventDefault();
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}
