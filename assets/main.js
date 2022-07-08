function writeShortendURL() {
    if (document.querySelector(".shortened_url p span").innerText != "") {
        document.querySelector(".shortened_url p").style.display = "flex";
    } else {
        document.querySelector(".shortened_url p").style.display = "none";
    }

    document.querySelector(".shortened_url p").onclick = function () {
        navigator.clipboard.writeText(
            document.querySelector(".shortened_url p span").textContent
        );
        alert(
            "Copied the text: " + document.querySelector(".shortened_url p span").textContent
        );
    };
}

document.querySelector('.open_form').onclick = () => document.querySelector('form').classList.toggle('active')

document.querySelector('form').onsubmit = function (e) {
    e.preventDefault();
    let formData = new FormData(document.querySelector('form'));
    fetch('./shorten.php', { method: 'POST', body: formData }).then(response => response.text()).then(data => {

        if (data != '') {
            document.querySelector('.shortened_url p').style.display = 'flex';
            document.querySelector('.shortened_url p span').textContent = data;
        }
    })
}

writeShortendURL();