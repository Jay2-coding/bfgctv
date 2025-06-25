function toggleDisplay(name, sectionId) {
            document.querySelectorAll(`input[name="${name}"]`).forEach(el => {
                el.addEventListener("change", () => {
                    document.getElementById(sectionId).style.display =
                        el.value === "yes" ? "block" : "none";
                });
            });
        }

        toggleDisplay("born-again", "born-again-question");
        toggleDisplay("baptized", "baptized-question");
        toggleDisplay("spirit", "spirit-question");
        toggleDisplay("gift", "gift-question");

        document.querySelectorAll('input[name="department[]"]').forEach(el => {
            el.addEventListener("change", () => {
                const checked = document.querySelectorAll('input[name="department[]"]:checked');
                if (checked.length > 2) {
                    el.checked = false;
                    alert("You can select a maximum of 2 departments.");
                }
            });
        });