// src/lib/cms.ts
export type Locale = "tr" | "en";

/* ========== DTOS ========== */
export type PageDTO = {
    slug: string;
    title: string;
    html?: string;
    sections?: { id: string; heading: string; text: string }[];
};

export type HomeDTO = {
    heroTitle: string;
    intro: string;
    featured: { slug: string; name: string; image?: string }[];
};

export type MenuItem = { href: string; label: string; children?: MenuItem[] };

export type MenuDTO = {
    brand: string;
    brandLogo: string;
    items: MenuItem[];
    colors: { hoverPink: string; dropdownBg: string; phoneHoverBg: string };
    whatsappUrl: string;
};

export type HeroDTO = {
    locale: string;
    title: string;
    subtitle: string;
    background: string;
    dots: string;
    workhours: string;
    footerText: string;
};

export type WelcomeDTO = {
    locale: Locale;
    title: string;
    content: string;
    text: string;
    subtitle?: string | null;
    html?: string | null;                    // zengin metin (CMS’ten HTML)
    image?: string | null;
    ctaText?: string | null;
    ctaLink?: string | null;
    bullets?: { icon?: string | null; title?: string | null; text?: string | null }[];
};

export type TreatmentsSectionDTO = {
    title: string;
    subtitle: string;
    intro: string;
    intro2: string;
    background: string;
    ctaText: string;
    ctaLink: string;
    treatments: { slug: string; label: string }[];
};
export type TreatmentDTO = {
    slug: string;
    locale: Locale;
    title: string;
    intro?: string | null;
    content?: string | null; // HTML
    heroImage?: string | null;
    seo?: { metaTitle?: string | null; metaDescription?: string | null } | null;
    sections?: { heading?: string | null; html?: string | null }[];
};
export type FooterDTO = {
    address_icon: string;
    address_title: string;
    address_text: string;
    contact_icon: string;
    contact_title: string;
    phone: string;
    email: string;
    socials: { platform: string; url: string; icon: string }[];
    quicklinks: { label: string; href: string }[];
    copyright: string;
};

export type OurPriceItem = {
    slug: string;
    name: string;
    currency: string;
    amount: number;
    unit?: string | null;
    note?: string | null;
    position: number;
};

export type OurPricesResponse = {
    slug: string;
    locale: "tr" | "en";
    title: string;
    intro?: string | null;      // HTML
    heroImage?: string | null;
    seo?: { metaTitle?: string | null; metaDescription?: string | null } | null;
    sections?: { heading?: string | null; html?: string | null }[];
    items: OurPriceItem[];
};
export type TeamMemberDTO = {
    slug: string;
    name: string;
    role?: string | null;
    bio?: string | null;         // HTML
    image?: string | null;
    position: number;
};

export type OurTeamResponse = {
    slug: string;
    locale: Locale;
    title: string;
    intro?: string | null;       // HTML
    heroImage?: string | null;
    seo?: { metaTitle?: string | null; metaDescription?: string | null } | null;
    sections?: { heading?: string | null; html?: string | null }[];
    members: TeamMemberDTO[];
};

export type SuccessRateItem = {
    slug: string;
    name: string;
    rate: number | null;
    unit?: string | null;
    note?: string | null;
    position: number;
};

export type SuccessRatesGroup = {
    key: string;
    heading?: string | null;
    items: SuccessRateItem[];
};

export type SuccessRatesResponse = {
    slug: string;
    locale: Locale;
    title: string;
    intro?: string | null;      // HTML
    heroImage?: string | null;
    seo?: { metaTitle?: string | null; metaDescription?: string | null } | null;
    sections?: { heading?: string | null; html?: string | null }[];
    groups: SuccessRatesGroup[];
};

export type FaqItem = { question: string; answer: string; position: number };
export type FaqCategory = { name: string; items: FaqItem[] };
export type FaqResponse = {
    slug: string;
    locale: Locale;
    title: string;
    intro?: string | null;     // HTML
    heroImage?: string | null;
    seo?: { metaTitle?: string|null; metaDescription?: string|null } | null;
    categories: FaqCategory[];
};


export type TravelItem = {
    title: string;
    html: string;
    icon?: string | null;
    link?: string | null;
    position: number;
};
export type TravelCategory = { name: string; items: TravelItem[] };
export type TravelResponse = {
    slug: string;
    locale: Locale;
    title: string;
    intro?: string | null;
    heroImage?: string | null;
    seo?: { metaTitle?: string|null; metaDescription?: string|null } | null;
    categories: TravelCategory[];
};

export type ContactField = { name: string; label: string; type: "text"|"email"|"tel"|"textarea"; required?: boolean };
export type ContactResponse = {
    slug: string;
    locale: Locale;
    title: string;
    intro?: string | null;      // HTML
    heroImage?: string | null;
    seo?: { metaTitle?: string|null; metaDescription?: string|null } | null;
    address: { title: string; text: string; mapUrl?: string|null; mapEmbed?: string|null };
    contact: { phone?: string|null; email?: string|null; whatsapp?: string|null };
    workhours?: string | null;
    socials: { platform: string; url: string; icon?: string }[];
    form: { fields: ContactField[] };
};

export type WhyUsItem = {
    slug: string;
    title?: string | null;
    text?: string | null;        // HTML
    image: string;
    aspect: string;              // "4/3", "16/9"...
    maxHeight?: number | null;
    position: number;
};
export type WhyUsPageResponse = {
    slug: string;
    locale: Locale;
    title: string;
    intro?: string | null;       // HTML
    heroImage?: string | null;
    seo?: { metaTitle?: string|null; metaDescription?: string|null } | null;
    items: WhyUsItem[];
};





export type ShowcaseDTO = { image: string };
export type WhyDTO = { slug: string; locale: Locale; image: string; aspect: string; maxHeight?: number };

/* ========== BASE ========== */
// Örn: NEXT_PUBLIC_API=http://127.0.0.1:8000/api
const API_BASE = (process.env.NEXT_PUBLIC_API ?? process.env.NEXT_PUBLIC_API_URL ?? "").replace(/\/+$/, "");
if (!API_BASE) throw new Error("NEXT_PUBLIC_API gerekli");
const REVALIDATE = Number(process.env.REVALIDATE_SECONDS ?? 60);
const url = (p: string) => `${API_BASE}${p.startsWith("/") ? p : `/${p}`}`;

/* ========== HELPERS ========== */
async function asJson<T>(res: Response): Promise<T> {
    if (!res.ok) throw new Error(`API ${res.status} ${res.statusText}`);
    return res.json();
}

/* ---------- PAGES ---------- */
export async function getHome(locale: Locale): Promise<HomeDTO> {
    const r = await fetch(url(`/pages/home?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    return asJson<HomeDTO>(r);
}

export async function getPage(locale: Locale, slugPath: string): Promise<PageDTO | null> {
    const safe = slugPath.split("/").map(encodeURIComponent).join("/");
    const r = await fetch(url(`/pages/${safe}?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    if (r.status === 404) return null;
    return asJson<PageDTO>(r);
}

export async function getAllSlugs(): Promise<string[]> {
    const r = await fetch(url(`/slugs`), { next: { revalidate: REVALIDATE } });
    return asJson<string[]>(r);
}

/* ---------- MENU ---------- */
export async function getMenu(locale: Locale): Promise<MenuDTO> {
    const r = await fetch(url(`/menus/main?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    return asJson<MenuDTO>(r);
}

/* ---------- HERO / WELCOME ---------- */
export async function getHero(locale: Locale): Promise<HeroDTO> {
    const r = await fetch(url(`/hero?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    return asJson<HeroDTO>(r);
}

export async function getWelcome(locale: Locale): Promise<WelcomeDTO> {
    const r = await fetch(url(`/welcome?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    return asJson<WelcomeDTO>(r);
}

/* ---------- TREATMENTS SECTION / SHOWCASE / FOOTER / WHY-US ---------- */
export async function getTreatmentsSection(locale: Locale): Promise<TreatmentsSectionDTO> {
    const r = await fetch(url(`/treatments-section?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    return asJson<TreatmentsSectionDTO>(r);
}

export async function getShowcase(locale: Locale): Promise<ShowcaseDTO> {
    const r = await fetch(url(`/showcase?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    return asJson<ShowcaseDTO>(r);
}

export async function getFooter(locale: Locale): Promise<FooterDTO> {
    const r = await fetch(url(`/footer?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    return asJson<FooterDTO>(r);
}

/* ---------- OUR PRICES ---------- */
export async function getOurPrices(locale: Locale, slug?: string): Promise<OurPricesResponse> {
    const qs = new URLSearchParams({ lang: locale });
    if (slug) qs.set("slug", slug);
    const r = await fetch(url(`/our-prices?${qs.toString()}`), { cache: "no-store" });
    return asJson<OurPricesResponse>(r);
}
export async function getOurTeam(locale: Locale, slug?: string): Promise<OurTeamResponse> {
    const qs = new URLSearchParams({ lang: locale });
    if (slug) qs.set("slug", slug);
    const r = await fetch(url(`/our-team?${qs.toString()}`), { next: { revalidate: REVALIDATE } });
    return asJson<OurTeamResponse>(r);
}

export async function getOurSuccessRates(locale: Locale, slug?: string): Promise<SuccessRatesResponse> {
    const qs = new URLSearchParams({ lang: locale });
    if (slug) qs.set("slug", slug);
    const r = await fetch(url(`/our-success-rates?${qs.toString()}`), { next: { revalidate: REVALIDATE } });
    return asJson<SuccessRatesResponse>(r);
}

export async function getTreatment(locale: Locale, slug: string): Promise<TreatmentDTO> {
    const safe = slug.split("/").map(encodeURIComponent).join("/");
    const r = await fetch(url(`/treatments/${safe}?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    return asJson<TreatmentDTO>(r);
}
export async function getFaq(locale: Locale): Promise<FaqResponse> {
    const r = await fetch(url(`/faq?lang=${locale}`), { cache: "no-store" });
    return asJson<FaqResponse>(r);
}
export async function getTravel(locale: Locale): Promise<TravelResponse> {
    const r = await fetch(url(`/travel?lang=${locale}`), { cache: "no-store" });
    return (await r.json()) as TravelResponse;
}
export async function getContact(locale: Locale): Promise<ContactResponse> {
    const r = await fetch(url(`/contact?lang=${locale}`), { cache: "no-store" });
    return asJson<ContactResponse>(r);
}

export async function sendContact(locale: Locale, payload: Record<string,string>) {
    const r = await fetch(url(`/contact?lang=${locale}`), {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(payload),
    });
    if (!r.ok) throw new Error(`Contact POST ${r.status}`);
    return r.json();
}
export async function getWhyUsPage(locale: Locale): Promise<WhyUsPageResponse> {
    const r = await fetch(url(`/why-us?lang=${locale}`), { cache: "no-store" });
    return asJson<WhyUsPageResponse>(r);
}

export async function getWhyUs(locale: Locale) {
    const r = await fetch(url(`/why-us?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    const data = await r.json();
    return Array.isArray(data) ? data[0] : (Array.isArray(data.items) ? data.items[0] : data);
}