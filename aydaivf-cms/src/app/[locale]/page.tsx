import {
    getHome,
    getHero,
    getWelcome,
    getTreatmentsSection,
    getShowcase
} from "@/lib/cms";

import Hero from "@/components/Hero";
import WelcomeSection from "@/components/WelcomeSection";
import TreatmentsSection from "@/components/TreatmentsSection";
import ShowcaseSection from "@/components/ShowcaseSection";

export default async function Home({
                                       params,
                                   }: {
    params: { locale: "tr" | "en" };
}) {
    const { locale } = params;

    const homeData = await getHome(locale);
    const heroData = await getHero(locale);
    const welcomeData = await getWelcome(locale);
    const treatmentsData = await getTreatmentsSection(locale);
    const showcaseData = await getShowcase(locale);

    return (
        <>
            <Hero {...heroData} />
            <WelcomeSection {...welcomeData} />
            <TreatmentsSection data={treatmentsData} locale={locale} />
            <ShowcaseSection data={showcaseData} />
        </>
    );
}
