import { countries } from "https://cdn.jsdelivr.net/npm/countries-list@3.1.0/+esm";
// Get an instance of `PhoneNumberUtil`.

document.addEventListener("DOMContentLoaded", function () {
    let selectedCounty = {
        key: null,
        value: null,
    };

    const form = document.forms["add-project-form"];

    const clientName = form && form.elements["clientName"];
    const email = form && form.elements["email"];
    const country = form && form.elements["country"];
    const location = form && form.elements["location"];
    const contact = form && form.elements["contact"];
    const projectName = form && form.elements["projectName"];
    const description = form && form.elements["description"];
    const category = form && form.elements["category"];
    const budget = form && form.elements["budget"];
    const priority = form && form.elements["priority"];
    const status = form && form.elements["status"];
    const startDate = form && form.elements["startDate"];
    const deadLine = form && form.elements["deadline"];

    for (const a of Object.values(countries)) {
        if (country) {
            country.innerHTML += `<option value="${a.name}" ${
                a.name === "Ghana" ? "selected" : ""
            }>${a.name}</option>`;
        }
    }

    let valid = true;

    if (country) {
        country.addEventListener("change", () => {
            for (const [key, value] of Object.entries(countries)) {
                if (value.name === country.value) {
                    selectedCounty = { key, value };
                }
            }
            contact.placeholder = `(${selectedCounty.value.phone[0]})xxxxxxxxx`;
            console.log(selectedCounty);
            document.querySelector("#budgetlabel").innerText = `Budget ${
                selectedCounty.value.currency[0]
                    ? ` (${selectedCounty.value.currency[0]}) `
                    : "GHS"
            }`;
        });
    }

    form && form.addEventListener("submit", function (e) {
        e.preventDefault();
        valid = true;
        // Hide all error messages
        hideErrorMessages(
            clientName,
            email,
            country,
            location,
            contact,
            projectName,
            description,
            category,
            budget,
            priority,
            status,
            startDate,
            deadLine
        );
        // Validate client name
        valid = validateClientName(clientName);
        console.log(valid + " client name");

        // Validate email
        valid = validateEmail(email);
        console.log(valid + " email");

        // Validate country

        valid = validateCountry(country);
        console.log(valid + " country");

        // Validate location
        valid = validateLocation(location);
        console.log(valid + " location");
        // Validate contact
        valid = validateContact(
            contact,
            selectedCounty.key ? selectedCounty.key : "GH"
        );
        console.log(valid + " contact");

        // Validate project name
        valid = validateProjectName(projectName);
        console.log(valid + " project name");
        // Validate description
        valid = validateDescription(description);
        console.log(valid + " description");
        // Validate category
        valid = validateCategory(category);
        console.log(valid + " category");
        // Validate budget
        valid = validateBudget(budget);
        console.log(valid + " budget");
        // Validate priority
        valid = validatePriority(priority);
        console.log(valid + " priority");
        // Validate status
        valid = validateStatus(status);
        console.log(valid + " status");
        // Validate start date
        valid = validateStartDate(startDate);
        console.log(valid + " start date");
        // Validate deadline
        valid = validateDeadLine(deadLine);
        console.log(valid + " deadline");
        // Validate date
        valid = validDate(startDate, deadLine);

        console.log(valid + " date");
        if (!valid) {
            console.log("not valid");
            return;
        }

        const data = {
            clientName: clientName.value,
            email: email.value,
            country: country.value,
            location: location.value,
            contact: contact.value,
            projectName: projectName.value,
            description: description.value,
            category: category.value,
            budget: budget.value,
            priority: priority.value,
            status: status.value,
            startDate: startDate.value,
            deadLine: deadLine.value,
        };
        console.log(data);

        /*try {
            const response = fetch("/api/projects", {
               method: "POST",
                headers: {
                     "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
            });

            if (!response.ok) {
                throw new Error("An error occurred while saving project");
            }
        } catch (error) {
            
        }*/
        window.location.href = "/project?projectloc=add";
    });
});

const hideErrorMessages = (
    clientName,
    email,
    country,
    location,
    contact,
    projectName,
    description,
    category,
    budget,
    priority,
    status,
    startDate,
    deadLine
) => {
    clientName.nextElementSibling.classList.add("hidden");
    email.nextElementSibling.classList.add("hidden");
    country.parentElement.nextElementSibling.classList.add("hidden");
    location.nextElementSibling.classList.add("hidden");
    contact.nextElementSibling.classList.add("hidden");
    projectName.nextElementSibling.classList.add("hidden");
    description.nextElementSibling.classList.add("hidden");
    category.parentElement.nextElementSibling.classList.add("hidden");
    budget.nextElementSibling.classList.add("hidden");
    priority.parentElement.nextElementSibling.classList.add("hidden");
    status.parentElement.nextElementSibling.classList.add("hidden");
    startDate.nextElementSibling.classList.add("hidden");
    deadLine.nextElementSibling.classList.add("hidden");
};

const validateClientName = (clientName) => {
    if (clientName.value.length < 3) {
        clientName.nextElementSibling.classList.remove("hidden");
        clientName.nextElementSibling.innerText =
            "Client name must be at least 3 characters";
        return false;
    }

    if (clientName.value.length > 50) {
        clientName.nextElementSibling.classList.remove("hidden");
        clientName.nextElementSibling.innerText =
            "Client name must be less than 50 characters";
        return false;
    }

    if (!isNaN(clientName.value)) {
        clientName.nextElementSibling.classList.remove("hidden");
        clientName.nextElementSibling.innerText =
            "Client name cannot be a number";
        return false;
    }
    return true;
};

const validateEmail = (email) => {
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!emailPattern.test(email.value)) {
        email.nextElementSibling.classList.remove("hidden");
        email.nextElementSibling.innerText = "Invalid email";
        return false;
    }
    return true;
};

const validateCountry = (country) => {
    if (!country.value) {
        country.parentElement.nextElementSibling.classList.remove("hidden");
        country.parentElement.nextElementSibling.innerText =
            "Country is required";
        return false;
    }
    return true;
};

const validateLocation = (location) => {
    if (location.value.length < 3) {
        location.nextElementSibling.classList.remove("hidden");
        location.nextElementSibling.innerText =
            "Location name must be at least 3 characters";
        return false;
    }

    if (location.value.length > 50) {
        location.nextElementSibling.classList.remove("hidden");
        location.nextElementSibling.innerText =
            "Location name must be less than 50 characters";
        return false;
    }

    if (!isNaN(location.value)) {
        location.nextElementSibling.classList.remove("hidden");
        location.nextElementSibling.innerText =
            "Location name cannot be a number";
        return false;
    }
    return true;
};

const validateContact = (contactElement, region = "GH") => {
    const phoneUtil = window.libphonenumber.PhoneNumberUtil.getInstance();
    const contactValue = contactElement.value.trim(); // Get and clean up input value

    try {
        if (!contactValue) {
            throw new Error("Phone number is required");
        }

        const parsedNumber = phoneUtil.parse(contactValue, region);

        if (!phoneUtil.isValidNumberForRegion(parsedNumber, region)) {
            // Show error for invalid number
            const errorMessageElement = contactElement.nextElementSibling;
            if (errorMessageElement) {
                errorMessageElement.classList.remove("hidden");
                errorMessageElement.innerText = "Invalid phone number";
            }
            return false;
        }

        // Hide error if the number is valid
        const errorMessageElement = contactElement.nextElementSibling;
        if (errorMessageElement) {
            errorMessageElement.classList.add("hidden");
            errorMessageElement.innerText = "";
        }

        return true;
    } catch (error) {
        // Show error for invalid number
        const errorMessageElement = contactElement.nextElementSibling;
        if (errorMessageElement) {
            errorMessageElement.classList.remove("hidden");
            errorMessageElement.innerText =
                error.message || "Invalid phone number format";
        }

        return false;
    }
};

const validateProjectName = (projectName) => {
    if (projectName.value.length < 3) {
        projectName.nextElementSibling.classList.remove("hidden");
        projectName.nextElementSibling.innerText =
            "Project name must be at least 3 characters";
        return false;
    }

    if (projectName.value.length > 50) {
        projectName.nextElementSibling.classList.remove("hidden");
        projectName.nextElementSibling.innerText =
            "Project name must be less than 50 characters";
        return false;
    }

    if (!isNaN(projectName.value)) {
        projectName.nextElementSibling.classList.remove("hidden");
        projectName.nextElementSibling.innerText =
            "Project name cannot be a number";
        return false;
    }
    return true;
};

const validateDescription = (description) => {
    if (description.value.length < 3) {
        description.nextElementSibling.classList.remove("hidden");
        description.nextElementSibling.innerText =
            "Description must be at least 3 characters";
        return false;
    }

    if (description.value.length > 500) {
        description.nextElementSibling.classList.remove("hidden");
        description.nextElementSibling.innerText =
            "Description must be less than 500 characters";
        return false;
    }

    if (!isNaN(description.value)) {
        description.nextElementSibling.classList.remove("hidden");
        description.nextElementSibling.innerText =
            "Description cannot be a number";
        return false;
    }
    return true;
};

const validateCategory = (category) => {
    if (!category.value) {
        category.parentElement.nextElementSibling.classList.remove("hidden");
        category.parentElement.nextElementSibling.innerText =
            "Category is required";
        return false;
    }

    return true;
};

const validateBudget = (budget) => {
    if (!budget.value) {
        budget.nextElementSibling.classList.remove("hidden");
        budget.nextElementSibling.innerText = "Budget is required";
        return false;
    }

    if (budget <= 0) {
        budget.nextElementSibling.classList.remove("hidden");
        budget.nextElementSibling.innerText = "Budget must be greater than 0";
        return false;
    }

    return true;
};

const validatePriority = (priority) => {
    if (!priority.value) {
        priority.parentElement.nextElementSibling.classList.remove("hidden");
        priority.parentElement.nextElementSibling.innerText =
            "Priority is required";
        return false;
    }

    return true;
};

const validateStatus = (status) => {
    if (!status.value) {
        status.parentElement.nextElementSibling.classList.remove("hidden");
        status.parentElement.nextElementSibling.innerText =
            "Status is required";
        return false;
    }

    return true;
};

const validateStartDate = (startDate) => {
    if (!startDate.value) {
        startDate.nextElementSibling.classList.remove("hidden");
        startDate.nextElementSibling.innerText = "Start date is required";
        return false;
    }

    return true;
};

const validateDeadLine = (deadLine) => {
    if (!deadLine.value) {
        deadLine.nextElementSibling.classList.remove("hidden");
        deadLine.nextElementSibling.innerText = "Deadline is required";
        return false;
    }

    return true;
};

const validDate = (startDate, deadLine) => {
    if (startDate.value > deadLine.value) {
        deadLine.nextElementSibling.classList.remove("hidden");
        deadLine.nextElementSibling.innerText =
            "Deadline must be greater than start date";
        return false;
    }

    if (startDate.value === deadLine.value) {
        deadLine.nextElementSibling.classList.remove("hidden");
        deadLine.nextElementSibling.innerText =
            "Deadline cannot be the same as start date";
        return false;
    }

    if (startDate.value < new Date().toISOString().split("T")[0]) {
        startDate.nextElementSibling.classList.remove("hidden");
        startDate.nextElementSibling.innerText =
            "Start date must be greater than today";
        return false;
    }

    if (deadLine.value <= new Date().toISOString().split("T")[0]) {
        deadLine.nextElementSibling.classList.remove("hidden");
        deadLine.nextElementSibling.innerText =
            "Deadline must be greater than today";
        return false;
    }

    return true;
};
