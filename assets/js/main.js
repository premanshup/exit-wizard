document.addEventListener("DOMContentLoaded", function () {
  // Get the modal & body element.
  const acEwModal = document.getElementById("acs-ew-wrapper");
  const acEwbody = document.querySelector("body");

  // Function to set a cookie with an expiration date.
  function acEwSetCookie(cookieName, cookieValue, daysToExpire) {
    const date = new Date();
    date.setTime(date.getTime() + daysToExpire * 24 * 60 * 60 * 1000);
    const expires = "expires=" + date.toUTCString();
    document.cookie =
      cookieName + "=" + cookieValue + "; " + expires + "; path=/";
  }

  // Function to get a cookie by name.
  function acEwGetCookie(cookieName) {
    const name = cookieName + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookieArray = decodedCookie.split(";");
    for (let i = 0; i < cookieArray.length; i++) {
      let cookie = cookieArray[i];
      while (cookie.charAt(0) === " ") {
        cookie = cookie.substring(1);
      }
      if (cookie.indexOf(name) === 0) {
        return cookie.substring(name.length, cookie.length);
      }
    }
    return "";
  }

  const acEwHandleMouseleave = (event) => {
    // The cookie doesn't exist, so show the popup.
    if (event.clientY < 0 && !acEwGetCookie("acEwExitPopupShown")) {
      acEwModal.style.display = "block";
      // Set the cookie to prevent the popup from showing for 30 days.
      acEwSetCookie("acEwExitPopupShown", "true", 30);
    }
  };

  // Add event listener to body.
  acEwbody.addEventListener("mouseleave", acEwHandleMouseleave);

  // Close popup on close button click.
  const acEwclose = document.getElementById("acs-ew-close");
  acEwclose.onclick = function () {
    acEwModal.style.display = "none";
  };
});
