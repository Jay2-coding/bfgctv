document.getElementById('donateBtn').addEventListener('click', () => {
    const accountInfo = document.getElementById('accountInfo');
    if (accountInfo.style.display === 'none' || accountInfo.style.display === '') {
        accountInfo.style.display = 'block';
    } else {
        accountInfo.style.display = 'none';
    }
});

document.getElementById('eventBtn').addEventListener('click', () => {
    const eventAll = document.getElementById('eventAll');
    if (eventAll.style.display === 'none' || eventAll.style.display === '') {
        eventAll.style.display = 'block';
    } else {
        eventAll.style.display = 'none';
    }
});


const API_KEY = 'AIzaSyAbNzvSmOsJGTIymW8JHsSz20qn3O4Gpqw';
const CHANNEL_ID = 'UCJHOxsgM9DU0ifV9pfVHC_A';

async function checkLiveStatus() {
    const liveContainer = document.getElementById('liveContainer');
    try {
        const response = await fetch(
            `https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=${CHANNEL_ID}&eventType=live&type=video&key=${API_KEY}`
        );
        const data = await response.json();
        if (data.items && data.items.length > 0) {
            // Live stream is active
            const videoId = data.items[0].id.videoId;
            liveContainer.innerHTML = `
                <div class="video-container">
                    <iframe
                        src="https://www.youtube.com/embed/${videoId}?autoplay=1&mute=1"
                        title="Live Stream - Bible Foundation Gospel Church"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
            `;
        } else {
            // No live stream currently
            liveContainer.innerHTML = `
                <div class="not-live-msg">
                    Program not yet started. Please check back later.
                </div>
            `;
        }
    } catch (error) {
        console.error('Error checking live status:', error);
        liveContainer.innerHTML = `
            <div class="not-live-msg">
                Unable to check live status. Please try again later.
            </div>
        `;
    }
}

document.addEventListener('DOMContentLoaded', checkLiveStatus);

setInterval(checkLiveStatus, 300000);


const slides = document.querySelectorAll('.carousel-slide');
        const dots = document.querySelectorAll('.carousel-dot');
        let current = 0;
        function showSlide(idx) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === idx);
                dots[i].classList.toggle('active', i === idx);
            });
        }
        function nextSlide() {
            current = (current + 1) % slides.length;
            showSlide(current);
        }
        dots.forEach((dot, idx) => {
            dot.addEventListener('click', () => {
                current = idx;
                showSlide(current);
            });
        });
        setInterval(nextSlide, 6000);