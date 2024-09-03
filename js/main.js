// Hamburger 

const hamburgerBtn = document.querySelector('.hamburger');
// let hamburgerOpen = true;

hamburgerBtn.addEventListener('click', () => {
    const hamburgerContainer = document.querySelector('.hamburger-container');
    // let open;

    hamburgerContainer.classList.toggle('active');

    if (hamburgerContainer.classList.contains('active')) {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = 'auto';
    }
});

// Photo popup on gallery page

const imgBtn = document.querySelectorAll('.image-btn');

imgBtn.forEach((btn) => {
    btn.addEventListener('click', () => {
        const popup = document.querySelector('.popup-wrapper');
        const popupImg = document.querySelector('.popup-img');
        const popupName = document.querySelector('.popup-name');
        const popupDate = document.querySelector('.popup-date');
        const popupDesc = document.querySelector('.popup-desc');

        const photoSrc = btn.getAttribute('data-src');
        const photoName = btn.getAttribute('data-name');
        const photoDesc = btn.getAttribute('data-desc');
        const photoDate = btn.getAttribute('data-date');

        popup.classList.add('active');
        popupImg.style.backgroundImage = 'url(photo-uploads/' + photoSrc + ')';
        popupName.innerText = photoName;
        popupDate.innerText = 'Uploaded: ' + photoDate;
        popupDesc.innerText = photoDesc;

        popup.addEventListener('click', () => {
            popup.classList.remove('active');
        })
    })
});