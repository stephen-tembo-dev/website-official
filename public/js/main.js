document.addEventListener('DOMContentLoaded', function () {


    const counterElement = document.getElementById('counter');
    const finalCount = 4000;
    const text = ' + positive reviews';
    const animationDuration = 2000; // Set animation duration to 2000 milliseconds (2 seconds)
    let animationStart;
  
    function updateCounter(timestamp) {
      if (!animationStart) {
        animationStart = timestamp;
      }
  
      const progress = timestamp - animationStart;
      const percentageComplete = Math.min(progress / animationDuration, 1);
  
      currentCount = Math.floor(finalCount * percentageComplete);
      counterElement.textContent = currentCount + text;
  
      if (percentageComplete < 1) {
        requestAnimationFrame(updateCounter);
      }
    }
  
    // Trigger animation when the element is in the viewport
    const observer = new IntersectionObserver(
      function (entries) {
        if (entries[0].isIntersecting) {
          animationStart = null; // Reset the animation start time
          requestAnimationFrame(updateCounter);
          counterElement.style.opacity = 1;
          counterElement.style.transform = 'translateY(0)';
          observer.disconnect(); // Stop observing once animation starts
        }
      },
      { threshold: 0.5 } // Trigger animation when 50% of the element is in the viewport
    );
  
    observer.observe(counterElement);
  });
  