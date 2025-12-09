<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>UberCloud</title>
<style>
    body {
        font-family: system-ui, sans-serif;
        background: white;  /*#0f172a;*/
        color: #e5e7eb;
        margin: 0;
        padding: 0;
    }

    header {
        padding: 20px 40px;
        background: rgba(15, 23, 42, 0.9);
        border-color: 1px solid #1f2937;
    }
    
    h1 { 
        margin: 0;
        font-size: 1.8rem;
    }

    .small, .medium, .big {
        border: 2px solid black;
        border-radius: 10px;
        width: 300px;
        height: 500px;
        transition: all 0.5s ease;
    }

    .small:hover, .medium:hover, .big:hover {
        box-shadow: 10px 10px 10px lightblue;
        transform: scale(1.025);
    }

    .smallText, .mediumText, .bigText {
        text-align: center;
    }

    .server {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        margin-top: 50px;
    }

    /* -------------------
       Balkendiagramme
       ------------------- */
    .diagrammSmall, .diagrammMedium, .diagrammBig {
        display: flex;
        justify-content: space-around;
        align-items: flex-end;
        height: 150px;
        width: 150px;
        margin-left: 75px;
        margin-top: 120px;
    }

    .bar {
        width: 30px;
        border-radius: 5px 5px 0 0;
        display: flex;
        justify-content: center;
        align-items: flex-end;
        color: white;
        font-weight: bold;
        font-size: 12px;
    }

    .bar.cpu { background-color: darkblue; }
    .bar.ram { background-color: blue; }
    .bar.ssd { background-color: turquoise; }

    .diagrammText {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        margin-top: 10px;
    }

    .cpu { color: darkblue; }
    .ram { color: blue; }
    .ssd { color: turquoise; }

    .formular {
        margin-top: 30px;
        border: 2px solid black;
        border-radius: 10px;
        width: 1095px;
        height: 300px;
        margin-left: 55px;
        padding: 30px;
        transition: all 0.5s ease;
    }

    .formular:hover {
        box-shadow: 10px 10px 10px lightblue;
        transform: scale(1.025)
    }

    .input {
        width: 1070px;
        height: 50px;
        font-size: 20px;
    }

    .text {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
    }

    .button {
        background-color: blue;
        color: white;
        height: 50px;
        width: 400px;
        display: block;
        margin: 30px auto 0 auto;
    }

    .preis {
        margin-top: 30px;
        border: 2px solid black;
        border-radius: 10px;
        transition: all 0.5s ease;
        margin-left: 55px;
        width: 1150px;
        height: 100px;
    }

    .preis:hover {
        box-shadow: 10px 10px 10px lightblue;
        transform: scale(1.025);
    }
</style>
</head>


<body>
    <header>
        <h1>UberCloud - Demo (Modul 346)</h1>
    </header>

    <main>
        <div>
            <div>
                <p>Laufende VMs:</p>
            </div>

            <div>
                <p>Monatlicher Gesamtumsatz:</p>
            </div>
        </div>
    </main>

<div class="server">
    <!-- SMALL -->
    <div class="small">
        <h2 class="smallText">Small</h2>
        <div class="diagrammSmall">
            <div class="bar cpu" style="height:75%;">75%</div>
            <div class="bar ram" style="height:50%;">50%</div>
            <div class="bar ssd" style="height:30%;">30%</div>
        </div>
        <div class="diagrammText">
            <h4 class="cpu">CPU: </h4>
            <h4 class="ram">RAM: </h4>
            <h4 class="ssd">SSD: </h4>
        </div>
    </div>

    <!-- MEDIUM -->
    <div class="medium">
        <h2 class="mediumText">Medium</h2>
        <div class="diagrammMedium">
            <div class="bar cpu" style="height:60%;">60%</div>
            <div class="bar ram" style="height:40%;">40%</div>
            <div class="bar ssd" style="height:80%;">80%</div>
        </div>
        <div class="diagrammText">
            <h4 class="cpu">CPU: </h4>
            <h4 class="ram">RAM: </h4>
            <h4 class="ssd">SSD: </h4>
        </div>
    </div>

    <!-- BIG -->
    <div class="big">
        <h2 class="bigText">Big</h2>
        <div class="diagrammBig">
            <div class="bar cpu" style="height:90%;">90%</div>
            <div class="bar ram" style="height:70%;">70%</div>
            <div class="bar ssd" style="height:50%;">50%</div>
        </div>
        <div class="diagrammText">
            <h4 class="cpu">CPU: </h4>
            <h4 class="ram">RAM: </h4>
            <h4 class="ssd">SSD: </h4>
        </div>
    </div>
</div>

<div class="formular">
    <form action="VM_Projekt.php">
        <label for="firmenname"></label>
        <input class="input" type="text" id="firmenname" name="firmenname" placeholder="Firmenname"><br>
    </form>

    <div class="text">
        <div class="checkboxCpu">
            <h4>Prozessoren (CPU): gewünschte Anzahl Cores</h4>
            <form action="VM_Projekt.php">
                <label><input type="radio" name="cpu" value="1">1 (5 CHF)</label><br>
                <label><input type="radio" name="cpu" value="2">2 (10 CHF)</label><br>
                <label><input type="radio" name="cpu" value="4">4 (18 CHF)</label><br>
                <label><input type="radio" name="cpu" value="8">8 (30 CHF)</label><br>
                <label><input type="radio" name="cpu" value="16">16 (45 CHF)</label><br>
            </form>
        </div>

        <div class="checkboxRam">
            <h4>Arbeitsspeicher (RAM): gewünschte Grösse in GB</h4>
            <form action="VM_Projekt.php">
                <label><input type="radio" name="ram" value="8">8 (10 CHF)</label><br>
                <label><input type="radio" name="ram" value="16">16 (20 CHF)</label><br>
                <label><input type="radio" name="ram" value="32">32 (40 CHF)</label><br>
                <label><input type="radio" name="ram" value="64">64 (80 CHF)</label><br>
                <label><input type="radio" name="ram" value="128">128 (160 CHF)</label><br>
            </form>
        </div>

        <div class="checkboxSsd">
            <h4>Speicherplatz (SSD): gewünschte Grösse in TB</h4>
            <form action="VM_Projekt.php">
                <label><input type="radio" name="ssd" value="8">2 (20 CHF)</label><br>
                <label><input type="radio" name="ssd" value="16">4 (40 CHF)</label><br>
                <label><input type="radio" name="ssd" value="32">8 (80 CHF)</label><br>
                <label><input type="radio" name="ssd" value="64">16 (160 CHF)</label><br>
                <label><input type="radio" name="ssd" value="128">32 (320 CHF)</label><br>
            </form>
        </div>
    </div>

    <form action="VM_Projekt.php">
        <label><input class="button" type="submit" name="absenden"></label>
    </form>
</div>

<div class="preis">
    <h1>0 CHF / Monat</h1>
</div>

</body>
</html>
