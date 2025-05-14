
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Topup Matric Card</title>
<link rel="stylesheet" href="index2.css">
</head>
<body data-rsssl=1 style="background-color:grey;">

<script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<main>
<div id="reader"></div>
<div id="result"></div>
</main>
<!-- JavaScript -->
<script>  
const scanner = new Html5QrcodeScanner('reader', {
qrbox: {
width: 250,
height: 250,
},
fps: 20,
});
scanner.render(success, error);
function success(result) {
document.getElementById('result').innerHTML = `
<h2>Success!</h2>
<p><a href="${result}.html">${result}.html</a></p>
`;
scanner.clear();
document.getElementById('reader').remove();
}
function error(err) {
console.error(err);
}
</script>
  <h1 align="center">Please Scan Your'e Matric Card</h1>
  <h2 align="center">"Please scan myPicture.jpeg to run"</h2>
<button onclick="window.location.href='index.php'" id="button1" style="background-color:lightgreen; display: block; margin: 0 auto;">Go Back</button>
</body>
</html>
