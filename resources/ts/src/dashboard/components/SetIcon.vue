<template>
    <div class="type_icon_handler">
        <template v-if="type === 1">
            <svg width="160" height="95" viewBox="0 0 160 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="160" height="95" rx="10" fill="#D9D9D9"/>
                <circle cx="17.5" cy="17.5" r="12.5" fill="#59F94B"/>
                <circle cx="17.5" cy="77.5" r="12.5" fill="#FF7171"/>
                <circle cx="17.5" cy="47.5" r="12.5" fill="#FF7171"/>
                <rect x="35" y="8" width="120" height="19" rx="9.5" fill="white"/>
                <rect x="35" y="38" width="120" height="19" rx="9.5" fill="white"/>
                <rect x="35" y="68" width="120" height="19" rx="9.5" fill="white"/>
            </svg>
        </template>
        <template v-else-if="type === 2">

            <svg width="160" height="95" viewBox="0 0 160 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="160" height="95" rx="10" fill="#D9D9D9"/>
                <circle cx="13.75" cy="13.75" r="8.75" fill="#59F94B"/>
                <rect x="25" y="7" width="50" height="13.5" rx="6.75" fill="white"/>
                <circle cx="13.75" cy="36.25" r="8.75" fill="#59F94B"/>
                <rect x="25" y="29.5" width="50" height="13.5" rx="6.75" fill="white"/>
                <circle cx="13.75" cy="58.75" r="8.75" fill="#59F94B"/>
                <rect x="25" y="52" width="50" height="13.5" rx="6.75" fill="white"/>
                <circle cx="13.75" cy="81.25" r="8.75" fill="#59F94B"/>
                <rect x="25" y="74.5" width="50" height="13.5" rx="6.75" fill="white"/>
                <circle cx="93.75" cy="13.75" r="8.75" fill="#FF7171"/>
                <rect x="105" y="7" width="50" height="13.5" rx="6.75" fill="white"/>
                <circle cx="93.75" cy="36.25" r="8.75" fill="#FF7171"/>
                <rect x="105" y="29.5" width="50" height="13.5" rx="6.75" fill="white"/>
                <circle cx="93.75" cy="58.75" r="8.75" fill="#FF7171"/>
                <rect x="105" y="52" width="50" height="13.5" rx="6.75" fill="white"/>
                <circle cx="93.75" cy="81.25" r="8.75" fill="#FF7171"/>
                <rect x="105" y="74.5" width="50" height="13.5" rx="6.75" fill="white"/>
            </svg>

        </template>
        <template v-else-if="type === 3">
            <svg width="160" height="95" viewBox="0 0 160 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="160" height="95" rx="10" fill="#D9D9D9"/>
                <circle cx="17.5" cy="17.5" r="12.5" fill="white"/>
                <circle cx="17.5" cy="77.5" r="12.5" fill="white"/>
                <circle cx="17.5" cy="47.5" r="12.5" fill="white"/>
                <rect x="35" y="8" width="120" height="19" rx="9.5" fill="#59F94B"/>
                <rect x="35" y="38" width="120" height="19" rx="9.5" fill="#77FF6B"/>
                <rect x="35" y="68" width="120" height="19" rx="9.5" fill="#A3FB9B"/>
                <path d="M12.76 24V22.52H16.66V11.28H16.52L13 14.56L12.02 13.5L15.72 10.04H18.34V22.52H21.94V24H12.76Z" fill="black"/>
                <path d="M21.66 54H12.5V52.28L17.06 48.08C17.7133 47.48 18.26 46.8467 18.7 46.18C19.14 45.5 19.36 44.82 19.36 44.14V43.9C19.36 43.1267 19.1467 42.5 18.72 42.02C18.2933 41.54 17.6467 41.3 16.78 41.3C16.3533 41.3 15.98 41.36 15.66 41.48C15.34 41.6 15.06 41.7667 14.82 41.98C14.5933 42.1933 14.4 42.4467 14.24 42.74C14.0933 43.02 13.9733 43.3267 13.88 43.66L12.38 43.08C12.5133 42.6667 12.6933 42.2667 12.92 41.88C13.16 41.48 13.4533 41.1267 13.8 40.82C14.16 40.5133 14.5867 40.2667 15.08 40.08C15.5867 39.8933 16.18 39.8 16.86 39.8C17.54 39.8 18.1467 39.9 18.68 40.1C19.2133 40.3 19.66 40.58 20.02 40.94C20.38 41.3 20.6533 41.7267 20.84 42.22C21.04 42.7133 21.14 43.26 21.14 43.86C21.14 44.4067 21.06 44.9133 20.9 45.38C20.7533 45.8467 20.5467 46.2933 20.28 46.72C20.0133 47.1333 19.6867 47.54 19.3 47.94C18.9267 48.34 18.52 48.74 18.08 49.14L14.32 52.52H21.66V54Z" fill="black"/>
                <path d="M16.22 76.96C17.1667 76.96 17.8733 76.7467 18.34 76.32C18.82 75.88 19.06 75.32 19.06 74.64V74.5C19.06 73.7667 18.8267 73.22 18.36 72.86C17.9067 72.4867 17.3067 72.3 16.56 72.3C15.84 72.3 15.2533 72.46 14.8 72.78C14.3467 73.0867 13.9733 73.5067 13.68 74.04L12.44 73.08C12.6133 72.8 12.82 72.5267 13.06 72.26C13.3133 71.98 13.6067 71.7333 13.94 71.52C14.2733 71.3067 14.66 71.1333 15.1 71C15.54 70.8667 16.04 70.8 16.6 70.8C17.1867 70.8 17.74 70.88 18.26 71.04C18.78 71.1867 19.2267 71.4133 19.6 71.72C19.9867 72.0133 20.2867 72.38 20.5 72.82C20.7267 73.26 20.84 73.76 20.84 74.32C20.84 74.7733 20.7667 75.18 20.62 75.54C20.4867 75.9 20.3 76.2133 20.06 76.48C19.82 76.7467 19.5333 76.9733 19.2 77.16C18.88 77.3467 18.5333 77.4867 18.16 77.58V77.66C18.5333 77.74 18.8933 77.8733 19.24 78.06C19.6 78.2333 19.9133 78.4667 20.18 78.76C20.46 79.04 20.68 79.3867 20.84 79.8C21.0133 80.2 21.1 80.66 21.1 81.18C21.1 81.78 20.9867 82.3333 20.76 82.84C20.5333 83.3333 20.2133 83.76 19.8 84.12C19.3867 84.4667 18.8867 84.74 18.3 84.94C17.7133 85.14 17.0667 85.24 16.36 85.24C15.76 85.24 15.2267 85.1733 14.76 85.04C14.2933 84.9067 13.88 84.7267 13.52 84.5C13.16 84.2733 12.84 84.02 12.56 83.74C12.2933 83.46 12.0533 83.1667 11.84 82.86L13.1 81.9C13.2733 82.18 13.46 82.4333 13.66 82.66C13.8733 82.8867 14.1067 83.08 14.36 83.24C14.6133 83.4 14.9 83.5267 15.22 83.62C15.54 83.7 15.9133 83.74 16.34 83.74C17.3267 83.74 18.0733 83.52 18.58 83.08C19.0867 82.6267 19.34 81.9867 19.34 81.16V81C19.34 80.1733 19.0867 79.54 18.58 79.1C18.0733 78.6467 17.3267 78.42 16.34 78.42H14.7V76.96H16.22Z" fill="black"/>
            </svg>
        </template>
        <template v-else>
            <div>No Such Icon</div>
        </template>
    </div>


</template>
<style>
.type_icon_handler svg{
    width: 65px;
    height: auto;
}
</style>
<script>
export default {
    name: "SetIcon",
    props:{
        type:null,
    }
}
</script>

<style scoped>

</style>
