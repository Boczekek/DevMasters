<h1>Home</h1>
<div class="grid">
    <?PHP
    session_start();
    if(!isset($_SESSION['login'])){
    ?>
    <div class="okno witaj">
        <div class="content">
            <h1>Witaj!</h1>
            <h3>Dołącz do unikalnej społeczności dla pasjonatów oprogramowania!</h3>
            <p>Zarejestruj się aby dołączyć do dyskusji, składać prośby o napisanie kodu lub aby aplikować jako developer.</p>
            <button onclick="location.href='register.html'" class="register" type="button">Zarejestruj się</button>
        </div>
        <img src="images/icon.png" alt="logo" class="logo">
    </div>
    <?PHP }; 
    if(isset($_SESSION['login']) && $_SESSION['ranga']<2){
    ?>
    <div class="okno developer">
        <h1>Dołącz do grona developerów!</h1>
        <p>Jako zweryfikowany developer możesz wykonywać zlecenia na napisanie kodu i zbierać za to punkty. Przekonaj nas w formularzu, że jesteś dobrym developerem i pomagaj innym.</p>
        <button onclick="location.href='aplikuj.html'" class="gradient aplikuj" type="button">Zostań developerem</button>
    </div>
    <?PHP
    }
    else if(!isset($_SESSION['login'])){
    ?>
    <div class="okno developer">
        <h1>Dołącz do grona developerów!</h1>
        <p>Jako zweryfikowany developer możesz wykonywać zlecenia na napisanie kodu i zbierać za to punkty. Przekonaj nas w formularzu, że jesteś dobrym developerem i pomagaj innym.</p>
        <button onclick="location.href='login.html'" class="gradient aplikuj" type="button">Zostań developerem</button>
    </div>
    <?PHP }; ?>
    <div class="okno">
        <h3>Przykładowe okno</h3>
        <p>Opis przykładowego okna tralala tralala</p>
    </div>
    <div class="okno">
        <h3>Przykładowe okno</h3>
        <p>Opis przykładowego okna tralala tralala</p>
    </div>
    <div class="okno">
        <h3>Przykładowe okno</h3>
        <p>Opis przykładowego okna tralala tralala</p>
    </div>
    <div class="okno">
        <h3>Przykładowe okno</h3>
        <p>Opis przykładowego okna tralala tralala</p>
    </div>
    <div class="okno">
        <h3>Przykładowe okno</h3>
        <p>Opis przykładowego okna tralala tralala</p>
    </div>
    <div class="okno">
        <h3>Przykładowe okno</h3>
        <p>Opis przykładowego okna tralala tralala</p>
    </div>
    <div class="okno">
        <h3>Przykładowe okno</h3>
        <p>Opis przykładowego okna tralala tralala</p>
    </div>
</div>
