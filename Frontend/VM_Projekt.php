<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>UberCloud</title>
<style>
    body {
        font-family: system-ui, sans-serif;
        background: #0f172a;
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

    main {
        max-width: 1100px;
        margin: 20px auto 60px auto;
        padding: 0 20px;
    }

    .grid {
        display: grid;
        grid-template-columns: 2fr 1.5fr;
        gap: 20px;
        margin-bottom: 30px
    }

    .card {
        background: rgba(15, 23, 42, 0.9);
        padding: 18px 20px;
        border-radius: 14px;
        border: 1px solid #1f2937;
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.35);
    }

    h2 {
        margin-top: 0;
        font-size: 1.2rem;
    }

    label {
        display: block;
        margin: 8px 0 4px 0;
        font-size: 0.9rem;
    }

    input[type="text"],
    select {
        width: 95%;
        padding: 8px 10px;
        border-radius: 8px;
        border: 1px solid #374151;
        background: #020617;
        font-size: 0.9 rem;
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
        margin-bottom: 50px;
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
        box-shadow: 5px 5px 5px lightblue;
        transform: scale(0.2)
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

    button {
        margin-top: 12px;
        padding: 9px 16px;
        border-radius: 999px;
        border: none;
        cursor: pointer;
        background: #22c55e;
        color: #022c22;
        font-weight: 600;
        font-size: 0.9rem;
    }

    button.delete {
        margin-top: 12px;
        padding: 9px 16px;
        border-radius: 999px;
        background: #ef4444;
        color: #450a0a;
        border: none;
        font-weight: 600;
        font-size: 0.9rem;

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

    .summary {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .summary-item {
        font-size: 0.9rem;
    }

    footer {
            text-align: center;
            color: #6b7280;
            font-size: 0.8rem;
            padding-bottom: 20px;
    }
</style>
</head>


<body>
    <header>
        <h1>UberCloud - Demo (Modul 346)</h1>
    </header>

    <main>
        <div class="summary">
            <div class="summary-item">
                <p>Laufende VMs:</p>
            </div>

            <div class="summary-item">
                <p>Monatlicher Gesamtumsatz:</p>
            </div>
        </div>

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

        <div class="grid">

            <!-- VM anlegen -->
            <div class="card">
                <h2>Virtuelle Maschine mieten</h2>
                
                <form method="post">
                    <label for="vm_name">Name der VM</label>
                    <input type="text" id="vm_name" name="vm_name" placeholder="z.B webserver-01" required>

                    <label for="cpu">CPU (Cores)</label>
                    <select name="cpu" id="cpu" required>
                        <option value="">Bitte wählen</option>
                        <!-- do kann meh au eh foreach loop mache -->
                        <option value="1">1 Cores (5CHF / Monat)</option>
                        <option value="1">2 Cores (5CHF / Monat)</option>
                        <option value="1">4 Cores (5CHF / Monat)</option>
                        <option value="1">8 Cores (5CHF / Monat)</option>
                        <option value="1">16 Cores (5CHF / Monat)</option>
                    </select>

                    <label for="cpu">CPU (Cores)</label>
                    <select name="cpu" id="cpu" required>
                        <option value="">Bitte wählen</option>
                        <!-- do kann meh au eh foreach loop mache -->
                        <option value="1">1 Cores (5CHF / Monat)</option>
                        <option value="1">2 Cores (5CHF / Monat)</option>
                        <option value="1">4 Cores (5CHF / Monat)</option>
                        <option value="1">8 Cores (5CHF / Monat)</option>
                        <option value="1">16 Cores (5CHF / Monat)</option>
                    </select>

                    <label for="cpu">CPU (Cores)</label>
                    <select name="cpu" id="cpu" required>
                        <option value="">Bitte wählen</option>
                        <!-- do kann meh au eh foreach loop mache -->
                        <option value="1">1 Cores (5CHF / Monat)</option>
                        <option value="1">2 Cores (5CHF / Monat)</option>
                        <option value="1">4 Cores (5CHF / Monat)</option>
                        <option value="1">8 Cores (5CHF / Monat)</option>
                        <option value="1">16 Cores (5CHF / Monat)</option>
                    </select>

                    <button type="submit">VM erstellen</button>
                </form>
            </div>

            <!-- VM lösche -->
            <div class="card">
                <h2>Virtuelle Maschine löschen</h2>
                <form method="post">
                    <label for="vm_name_delete">Name der VM</label>
                    <input type="text" id="vm_name_delete" name="vm_name_delete" placeholder="z.B webserver-01" required>

                    <button type="submit" class="delete">WM löschen</button>

                    <p>
                        Hinweis: die vm wird gelöscht!!!!!!!!1!!1!
                    </p>
                </form>
            </div>

            <!-- Liste der VMs -->
            <div class="card">
                <h2>Laufende virtuelle Maschinen</h2>
                <p>keine vms</p>

                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Name</th>
                            <th>Name</th>
                            <th>Name</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <!-- Preis -->
            <div class="card">
                <h2>Preis</h2>
            </div>
            
        </div>
    </main>

    <footer>
        UberCloud
    </footer>


</body>
</html>
