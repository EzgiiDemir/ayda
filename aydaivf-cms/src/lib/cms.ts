export type Locale = "tr" | "en";

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

export type ShowcaseDTO = {
    image: string;
};
const API_BASE = (process.env.NEXT_PUBLIC_API ?? "").replace(/\/+$/, "");
if (!API_BASE) throw new Error("NEXT_PUBLIC_API gerekli");

const REVALIDATE = Number(process.env.REVALIDATE_SECONDS ?? 60);

const url = (p: string) => `${API_BASE}${p.startsWith("/") ? p : `/${p}`}`;

async function asJson<T>(res: Response): Promise<T> {
    if (!res.ok) throw new Error(`API ${res.status}`);
    return res.json();
}

/* ---------- PAGES ---------- */
export async function getHome(locale: Locale): Promise<HomeDTO> {
    const r = await fetch(url(`/pages/home?lang=${locale}`), {
        next: { revalidate: REVALIDATE }
    });
    return asJson<HomeDTO>(r);
}

export async function getPage(locale: Locale, slugPath: string): Promise<PageDTO | null> {
    const r = await fetch(url(`/pages/${encodeURIComponent(slugPath)}?lang=${locale}`), {
        next: { revalidate: REVALIDATE }
    });
    if (r.status === 404) return null;
    return asJson<PageDTO>(r);
}

export async function getAllSlugs(): Promise<string[]> {
    const r = await fetch(url(`/slugs`), {
        next: { revalidate: REVALIDATE }
    });
    return asJson<string[]>(r);
}

/* ---------- MENU ---------- */
export async function getMenu(locale: Locale): Promise<MenuDTO> {
    const res = await fetch(url(`/menus/main?lang=${locale}`), {
        next: { revalidate: REVALIDATE }
    });
    if (!res.ok) throw new Error(`API ${res.status}`);
    return res.json();
}

/* ---------- HERO ---------- */
export async function getHero(locale: Locale): Promise<HeroDTO> {
    const res = await fetch(url(`/hero?lang=${locale}`), {
        next: { revalidate: REVALIDATE }
    });
    if (!res.ok) throw new Error("Hero API failed");
    return res.json();
}

/* ---------- WELCOME ---------- */
export async function getWelcome(locale: Locale) {
    const res = await fetch(url(`/welcome?lang=${locale}`), {
        next: { revalidate: REVALIDATE }
    });
    if (!res.ok) throw new Error("Welcome API failed");
    return res.json();
}
export async function getTreatmentsSection(locale: string): Promise<TreatmentsSectionDTO> {
    const res = await fetch(`${process.env.NEXT_PUBLIC_API}/treatments-section?lang=${locale}`, {
        next: { revalidate: Number(process.env.REVALIDATE_SECONDS ?? 60) },
    });
    if (!res.ok) throw new Error("TreatmentsSection API failed");
    return res.json();
}
export async function getShowcase(locale: string): Promise<ShowcaseDTO> {
    const res = await fetch(`${process.env.NEXT_PUBLIC_API}/showcase?lang=${locale}`, {
        next: { revalidate: Number(process.env.REVALIDATE_SECONDS ?? 60) },
    });
    if (!res.ok) throw new Error("Showcase API failed");
    return res.json();
}
export async function getFooter(locale: Locale): Promise<FooterDTO> {
    const res = await fetch(`${process.env.NEXT_PUBLIC_API}/footer?lang=${locale}`, {
        next: { revalidate: Number(process.env.REVALIDATE_SECONDS ?? 60) },
    });
    if (!res.ok) throw new Error("Footer API failed");
    return res.json();
}