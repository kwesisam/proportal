import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                background: "rgb(var(--background))",
                foreground: "rgb(var(--foreground))",
                card: "rgb(var(--card))",
                "card-foreground": "rgb(var(--card-foreground))",
                primary: "rgb(var(--primary))",
                "primary-foreground": "rgb(var(--primary-foreground))",
                secondary: "rgb(var(--secondary))",
                "secondary-foreground": "rgb(var(--secondary-foreground))",
                tertiary: "rgb(var(--tertiary))",
                muted: "rgb(var(--muted))",
                "muted-foreground": "rgb(var(--muted-foreground))",
                accent: "rgb(var(--accent))",
                "accent-foreground": "rgb(var(--accent-foreground))",
                destructive: "rgb(var(--destructive))",
                "destructive-foreground": "rgb(var(--destructive-foreground))",
                border: "rgb(var(--border))",
                input: "rgb(var(--input))",
                header: "rgb(var(--header))",
            },
            borderRadius: {
                DEFAULT: "var(--radius)",
            },
        },
    },
    plugins: [require("preline/plugin")],
};
