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
export type OurPricesDTO = {
    html: string; // container içi render edilecek tam HTML
    sections?: {
        headerImage?: string | null;   // hero
        contextTitle?: string | null;  // "Fiyatlarımız"
    };
};
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
    html?: string | null;
    image?: string | null;
    ctaText?: string | null;
    ctaLink?: string | null;
    bullets?: { icon?: string | null; title?: string | null; text?: string | null }[];
    ceoName?: string | null;
    ceoTitle?: string | null;
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
    socials: { platform: string; url: string }[];
    quicklinks: { label: string; href: string }[];
    copyright: string;
    address_badge?: string | null;
    footer_badge?: string | null;
    footer_badge_href?: string | null; // backend'de yoksa opsiyonel kalsın
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
    locale: Locale;
    title: string;
    intro?: string | null; // HTML
    heroImage?: string | null;
    seo?: { metaTitle?: string | null; metaDescription?: string | null } | null;
    sections?: { heading?: string | null; html?: string | null }[];
    items: OurPriceItem[];
};

export type WhyUsDTO = {
    title: string;
    html: string; // rendered html
    sections?: {
        headerImage?: string | null;
        contextTitle?: string | null;
    };
};

export type TeamMemberDTO = {
    slug: string;
    name: string;
    role?: string | null;
    bio?: string | null; // HTML
    image?: string | null;
    position: number;
};

export type OurTeamResponse = {
    slug: string;
    locale: Locale;
    title: string;
    intro?: string | null; // HTML
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
    intro?: string | null; // HTML
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
    intro?: string | null; // HTML
    heroImage?: string | null;
    seo?: { metaTitle?: string | null; metaDescription?: string | null } | null;
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
    seo?: { metaTitle?: string | null; metaDescription?: string | null } | null;
    categories: TravelCategory[];
};

export type ContactField = {
    name: string;
    label: string;
    type: "text" | "email" | "tel" | "textarea";
    required?: boolean;
};
export type ContactResponse = {
    slug: string;
    locale: Locale;
    title: string;
    intro?: string | null; // HTML
    heroImage?: string | null;
    seo?: { metaTitle?: string | null; metaDescription?: string | null } | null;
    address: { title: string; text: string; mapUrl?: string | null; mapEmbed?: string | null };
    contact: { phone?: string | null; email?: string | null; whatsapp?: string | null };
    workhours?: string | null;
    socials: { platform: string; url: string; icon?: string }[];
    form: { fields: ContactField[] };
};

export type WhyUsItem = {
    slug: string;
    title?: string | null;
    text?: string | null; // HTML
    image: string;
    aspect: string; // "4/3", "16/9"...
    maxHeight?: number | null;
    position: number;
};
export type WhyUsPageResponse = {
    slug: string;
    locale: Locale;
    title: string;
    intro?: string | null; // HTML
    heroImage?: string | null;
    seo?: { metaTitle?: string | null; metaDescription?: string | null } | null;
    items: WhyUsItem[];
};

export type ShowcaseDTO = { image: string };
export type WhyDTO = { slug: string; locale: Locale; image: string; aspect: string; maxHeight?: number };

/* ========== BASE ========== */
// Örn: NEXT_PUBLIC_API=https://api.aydaivf.com/api
export const API_BASE = (process.env.NEXT_PUBLIC_API ?? process.env.NEXT_PUBLIC_API_URL ?? "").replace(
    /\/+$/,
    ""
);
if (!API_BASE) throw new Error("NEXT_PUBLIC_API gerekli");
export const API_ORIGIN = API_BASE.replace(/\/api\/?$/, ""); // /uploads gibi dosyalar için
export const REVALIDATE = Number(process.env.REVALIDATE_SECONDS ?? 60);

const apiUrl = (p: string) => `${API_BASE}${p.startsWith("/") ? p : `/${p}`}`;

/* ========== URL HELPERS ========== */
const isFull = (u: string) => /^(https?:)?\/\//i.test(u) || /^data:/i.test(u);
const isAssetPath = (u: string) =>
    u.startsWith("/uploads") || u.startsWith("/storage") || u.startsWith("/media");

export const abs = (u?: string | null) => {
    if (!u) return "";
    if (isFull(u)) return u;
    if (isAssetPath(u)) return `${API_ORIGIN}${u}`;
    return `${API_BASE}${u.startsWith("/") ? u : `/${u}`}`;
};
export const toAbs = abs;

/* ========== HELPERS ========== */
async function asJson<T>(res: Response): Promise<T> {
    if (!res.ok) {
        let body = "";
        try {
            body = await res.clone().text();
        } catch {}
        throw new Error(`API ${res.status} ${res.statusText}${body ? ` :: ${body.slice(0, 300)}` : ""}`);
    }
    return res.json();
}

/* ---------- PAGES ---------- */
export async function getHome(locale: Locale): Promise<HomeDTO> {
    const r = await fetch(apiUrl(`/pages/home?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    return asJson<HomeDTO>(r);
}

export async function getPage(locale: Locale, slugPath: string): Promise<PageDTO | null> {
    const safe = slugPath.split("/").map(encodeURIComponent).join("/");
    const r = await fetch(apiUrl(`/pages/${safe}?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    if (r.status === 404) return null;
    return asJson<PageDTO>(r);
}

export async function getAllSlugs(): Promise<string[]> {
    const r = await fetch(apiUrl(`/slugs`), { next: { revalidate: REVALIDATE } });
    return asJson<string[]>(r);
}

/* ---------- MENU ---------- */
export async function getMenu(locale: Locale): Promise<MenuDTO> {
    const r = await fetch(apiUrl(`/menus/main?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    return asJson<MenuDTO>(r);
}

/* ---------- HERO / WELCOME ---------- */
export async function getHero(locale: Locale): Promise<HeroDTO> {
    const r = await fetch(apiUrl(`/hero?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    return asJson<HeroDTO>(r);
}

export async function getWelcome(locale: Locale): Promise<WelcomeDTO> {
    const r = await fetch(apiUrl(`/welcome?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    return asJson<WelcomeDTO>(r);
}

/* ---------- TREATMENTS SECTION / SHOWCASE / FOOTER / WHY-US ---------- */
export async function getTreatmentsSection(locale: Locale): Promise<TreatmentsSectionDTO> {
    const r = await fetch(apiUrl(`/treatments-section?lang=${locale}`), {
        next: { revalidate: REVALIDATE },
    });
    return asJson<TreatmentsSectionDTO>(r);
}

export async function getShowcase(locale: Locale): Promise<ShowcaseDTO | ShowcaseDTO[]> {
    const r = await fetch(apiUrl(`/showcase?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    return asJson<ShowcaseDTO | ShowcaseDTO[]>(r);
}

/** Footer backend'inizde tek kayıttan döner:
 *  - /uploads yolları API_ORIGIN ile mutlaklaştırılır
 *  - data: ve https:// olduğu gibi bırakılır
 */
export async function getFooter(locale: Locale): Promise<FooterDTO> {
    // Laravel tarafı dil bağımsız ise ?lang paramı görmezden gelir; bırakalım
    const r = await fetch(apiUrl(`/footer?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    const j = await asJson<any>(r);

    const socials =
        Array.isArray(j.socials) ? j.socials.map((s: any) => ({ platform: s.platform ?? "", url: s.url ?? "#" })) : [];

    const quicklinks =
        Array.isArray(j.quicklinks)
            ? j.quicklinks.map((q: any) => ({ label: q.label ?? "", href: q.href ?? "#" }))
            : [];

    const normalizeImg = (u?: string | null) => abs(u ?? "");

    const footer: FooterDTO = {
        address_icon: normalizeImg(j.address_icon ?? ""),
        address_title: j.address_title ?? "",
        address_text: j.address_text ?? "",
        contact_icon: normalizeImg(j.contact_icon ?? ""),
        contact_title: j.contact_title ?? "",
        phone: j.phone ?? "",
        email: j.email ?? "",
        socials,
        quicklinks,
        copyright: j.copyright ?? "",
        address_badge: j.address_badge ? normalizeImg(j.address_badge) : null,
        footer_badge: j.footer_badge ? normalizeImg(j.footer_badge) : null, // base64 ise dokunulmaz
        footer_badge_href: j.footer_badge_href ?? null,
    };

    return footer;
}

/* ---------- OUR PRICES / TEAM / SUCCESS RATES ---------- */
export async function getOurPrices(locale: Locale, slug?: string): Promise<OurPricesDTO> {
    const qs = new URLSearchParams({ lang: locale });
    if (slug) qs.set("slug", slug);

    const r = await fetch(apiUrl(`/our-prices?${qs.toString()}`), { cache: "no-store" });
    const j = await asJson<OurPricesResponse>(r);

    const headerImage = j.heroImage ? abs(j.heroImage) : null;
    const contextTitle = j.title ?? (locale === "tr" ? "Fiyatlarımız" : "Our Prices");

    // Fiyat formatı: "3.500 Euro" gibi
    const fmt = (amt: number, cur: string) => {
        const n = Math.round(Number(amt) || 0);
        const num = n.toLocaleString("tr-TR");
        const c = (cur || "").toUpperCase();
        if (c === "EUR") return `${num} Euro`;
        if (c === "USD") return `${num} USD`;
        if (c === "TRY" || c === "TL") return `${num} TL`;
        return `${num} ${c || ""}`.trim();
    };

    const rowsHtml = (j.items || [])
        .sort((a, b) => (a.position ?? 0) - (b.position ?? 0))
        .map((it) => {
            const price = fmt(it.amount, it.currency) + (it.unit ? ` (${it.unit})` : "");
            return `
        <tr class="hover:bg-gray-50 transition-colors">
          <td class="p-3 border-b border-gray-300">${it.name}</td>
          <td class="p-3 border-b border-gray-300">${price}</td>
        </tr>`;
        })
        .join("");

    const tableTitleLeft = locale === "tr" ? "Tedavi Tipi" : "Treatment";
    const tableTitleRight = locale === "tr" ? "Fiyatı" : "Price";

    const tableHtml = `
    <div class="overflow-x-auto mt-3">
      <figure class="table" style="min-width:100%;">
        <table class="min-w-full border border-gray-300 text-xs md:text-sm">
          <thead>
            <tr class="bg-gray-100">
              <th class="text-left p-3 border-b border-gray-300 font-semibold"><strong>${tableTitleLeft}</strong></th>
              <th class="text-left p-3 border-b border-gray-300 font-semibold"><strong>${tableTitleRight}</strong></th>
            </tr>
          </thead>
          <tbody>${rowsHtml}</tbody>
        </table>
      </figure>
    </div>`;

    // Intro + ek bölümler
    const introHtml = j.intro ?? "";
    const sectionsHtml = (j.sections || [])
        .map(
            (s) => `
      <div class="flex flex-col lg:flex-row gap-6 items-center">
        <div class="flex-1 flex flex-col gap-2">
          ${s.heading ? `<p class="text-sm md:text-base text-ayda-pink-light capitalize font-medium text-center">${s.heading}</p>` : ""}
          <div class="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-1">
            ${s.html ?? ""}
          </div>
        </div>
      </div>`
        )
        .join("");

    // UI’nin talep ettiği tam içerik (container içi)
    const html = `
  <div class="flex flex-col gap-7 md:gap-10">
    <div class="flex flex-col gap-3">
      <div class="flex flex-col gap-6 items-center">
        <div class="flex-1 flex flex-col gap-2">
          <div class="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-1">
            <div class="flex flex-col gap-3">
              <div class="flex flex-col lg:flex-row gap-6 items-center">
                <div class="flex-1 flex flex-col gap-2">
                  <div class="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-1">
                    ${introHtml}
                  </div>
                </div>
              </div>
            </div>
            ${tableHtml}
          </div>
        </div>
      </div>
    </div>
    ${sectionsHtml}
  </div>`;

    return {
        html,
        sections: {
            headerImage,
            contextTitle,
        },
    };
}

export async function getOurTeam(locale: Locale, slug?: string): Promise<OurTeamResponse> {
    const qs = new URLSearchParams({ lang: locale });
    if (slug) qs.set("slug", slug);
    const r = await fetch(apiUrl(`/our-team?${qs.toString()}`), { next: { revalidate: REVALIDATE } });
    return asJson<OurTeamResponse>(r);
}

export async function getOurSuccessRates(locale: Locale, slug?: string): Promise<SuccessRatesResponse> {
    const qs = new URLSearchParams({ lang: locale });
    if (slug) qs.set("slug", slug);
    const r = await fetch(apiUrl(`/our-success-rates?${qs.toString()}`), {
        next: { revalidate: REVALIDATE },
    });
    return asJson<SuccessRatesResponse>(r);
}

/* ---------- TREATMENT (dynamic) ---------- */
export async function getTreatment(locale: Locale, slug: string): Promise<TreatmentDTO> {
    const safe = slug.split("/").map(encodeURIComponent).join("/");
    const r = await fetch(apiUrl(`/treatments/${safe}?lang=${locale}`), {
        next: { revalidate: REVALIDATE },
    });
    return asJson<TreatmentDTO>(r);
}

/* ---------- FAQ / TRAVEL / CONTACT ---------- */
export async function getFaq(locale: Locale): Promise<FaqResponse> {
    const r = await fetch(apiUrl(`/faq?lang=${locale}`), { cache: "no-store" });
    return asJson<FaqResponse>(r);
}

export async function getTravel(locale: Locale): Promise<TravelResponse> {
    const r = await fetch(apiUrl(`/travel?lang=${locale}`), { cache: "no-store" });
    return asJson<TravelResponse>(r);
}

export async function getContact(locale: Locale): Promise<ContactResponse> {
    const r = await fetch(apiUrl(`/contact?lang=${locale}`), { cache: "no-store" });
    return asJson<ContactResponse>(r);
}

export async function sendContact(locale: Locale, payload: Record<string, string>) {
    const r = await fetch(apiUrl(`/contact?lang=${locale}`), {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(payload),
    });
    if (!r.ok) throw new Error(`Contact POST ${r.status}`);
    return r.json();
}

/* ---------- WHY US ---------- */
export async function getWhyUs(locale: Locale): Promise<WhyUsDTO> {
    const slug = locale === "tr" ? "neden-biz" : "why-us";
    const r = await fetch(apiUrl(`/pages/${slug}?lang=${locale}`), { next: { revalidate: 60 } });
    const j = await asJson<any>(r);
    return {
        title: j.title ?? "",
        html: j.html ?? "",
        sections: j.sections ?? {},
    };
}
