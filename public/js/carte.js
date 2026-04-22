document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("carteForm");
    if (!form) return;

    form.addEventListener("submit", function (e) {

        let valid = true;

        const type = document.getElementById("carte_typeCarte")?.value || "";
        const adresse = document.getElementById("carte_adresse")?.value.trim() || "";
        const montant = parseFloat(document.getElementById("carte_solde")?.value);

        console.log("TYPE:", type);
        console.log("MONTANT:", montant);

        // RESET
        document.getElementById("typeError")?.classList.add("d-none");
        document.getElementById("adresseError")?.classList.add("d-none");
        document.getElementById("montantError")?.classList.add("d-none");

        // TYPE
        if (!type) {
            document.getElementById("typeError")?.classList.remove("d-none");
            valid = false;
        }

        // ADRESSE
        if (adresse.length < 5) {
            document.getElementById("adresseError")?.classList.remove("d-none");
            valid = false;
        }

        // MONTANT
        if (isNaN(montant) || montant <= 0) {
            document.getElementById("montantError")?.classList.remove("d-none");
            valid = false;
        }

        if (!valid) {
            e.preventDefault();
            return;
        }

        // BUSINESS RULES
        if (type === "GOLD" && montant < 1000) {
            alert("Gold nécessite minimum 1000 DT");
            e.preventDefault();
        }

        if (type === "PLATINUM" && montant < 2000) {
            alert("Platinum nécessite minimum 2000 DT");
            e.preventDefault();
        }

    });

});