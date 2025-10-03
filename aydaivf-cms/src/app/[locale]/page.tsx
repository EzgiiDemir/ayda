import Hero from "@/components/site/Hero";
import {
    getHero, getWelcome, getTreatmentsSection, getShowcase, ShowcaseDTO
} from "@/lib/cms";
import WelcomeSection from "@/components/site/WelcomeSection";
import TreatmentsSection from "@/components/site/TreatmentsSection";
import ShowcaseSection from "@/components/site/ShowcaseSection";
import {Locale} from "@/lib/api";

const API_BASE = (process.env.NEXT_PUBLIC_API ?? "").replace(/\/+$/, "");
const abs = (u?: string | null) =>
    !u ? "" : u.startsWith("http") ? u : `${API_BASE}${u.startsWith("/") ? u : `/${u}`}`;

// slug’ı normalize et (başındaki locale varsa sil)
const normalizeSlug = (slug: string, locale: Locale) =>
    slug.replace(new RegExp(`^/?${locale}/?`), "").replace(/^\/+/, "");

export default async function HomePage({
                                           params,
                                       }: {
    params: Promise<{ locale: Locale }>;
}) {
    const { locale } = await params;

    const [hero, welcome, ts, showcase] = await Promise.all([
        getHero(locale),
        getWelcome(locale),
        getTreatmentsSection(locale),
        getShowcase(locale),
    ]);
    const showcaseRes = await getShowcase(locale);

    const showcaseItems: ShowcaseDTO[] = Array.isArray(showcaseRes) ? showcaseRes : [showcaseRes].filter(Boolean);

    return (
        <main className="flex-1 flex flex-col">
            {/* HERO */}
            <Hero
                locale={locale}
                title={hero.title}
                subtitle={hero.subtitle}
                workhours={hero.workhours}
                footerText={hero.footerText}
                background={abs(hero.background)}
                dots={abs(hero.dots)}
            />

            {/* WELCOME */}
            <WelcomeSection
                subtitle={welcome?.subtitle ?? ""}
                title={welcome?.title ?? ""}
                content={welcome?.html ?? welcome?.content ?? welcome?.text ?? ""}
                image={welcome?.image ?? null}
                ceo_name={welcome?.ctaText ?? "Tanyel FELEK, MS"}        // İstersen farklı alan bağla
                ceo_title={welcome?.ctaLink ?? "Ayda Tüp Bebek Takımı Direktörü & Embriyoloji Laboratuvarı Sorumlusu"}
            />
            {/* TREATMENTS */}
            <TreatmentsSection data={ts} locale={locale} />

            {/* SHOWCASE */}
            <ShowcaseSection data={{
                image: ""
            }} />
        </main>
    );
}
