export type Locale = "tr" | "en";

const MOCK = {
    tr: {
        home: {
            heroTitle: "Gelin size sahip olabileceğiniz\nen güzel hediyeyi verelim",
            intro: "Kuzey Kıbrıs Lefkoşa’nın merkezinde bulunan kliniğimiz...",
            featured: [
                { slug: "tedaviler/tupbebekivf", name: "Tüp Bebek (IVF) - ICSI" },
                { slug: "tedaviler/yumurtadonasyonu", name: "Yumurta Donasyonu" },
            ],
        },
        pages: {
            "hakkimizda": { title: "Hakkımızda", html: "<p>Ayda IVF hakkında...</p>" },
            "seyahat": { title: "Seyahat", html: "<p>Transfer ve konaklama...</p>" },
            "sss": { title: "Sık Sorulan Sorular", html: "<p>...</p>" },
            "iletisim": { title: "İletişim", html: "<p>Adres ve telefon...</p>" },
            "tedaviler/tupbebekivf": { title: "Tüp Bebek (IVF) - ICSI", html: "<p>İçerik...</p>" },
            "tedaviler/yumurtadonasyonu": { title: "Yumurta Donasyonu", html: "<p>İçerik...</p>" },
        },
    },
    en: {
        home: {
            heroTitle: "Let us give you the most beautiful gift",
            intro: "Our clinic in the heart of Nicosia, Northern Cyprus...",
            featured: [
                { slug: "treatments/ivf-icsi", name: "IVF - ICSI" },
                { slug: "treatments/egg-donation", name: "Egg Donation" },
            ],
        },
        pages: {
            "about": { title: "About Us", html: "<p>About Ayda IVF...</p>" },
            "travel": { title: "Travel", html: "<p>Transfers & stay...</p>" },
            "faq": { title: "FAQ", html: "<p>...</p>" },
            "contact": { title: "Contact", html: "<p>Address and phone...</p>" },
            "treatments/ivf-icsi": { title: "IVF - ICSI", html: "<p>Content...</p>" },
            "treatments/egg-donation": { title: "Egg Donation", html: "<p>Content...</p>" },
        },
    },
} as const;

export async function fetchHome(locale: Locale) {
    // prod: const r = await fetch(`${process.env.NEXT_PUBLIC_API}/pages/home?lang=${locale}`); return r.json();
    return (MOCK as any)[locale].home;
}

export async function fetchPage(locale: Locale, path: string) {
    const bucket = (MOCK as any)[locale];
    if (!bucket) return null;
    return bucket.pages[path] ?? null;
}

export function allSlugs(locale: Locale): string[] {
    return Object.keys((MOCK as any)[locale].pages);
}
