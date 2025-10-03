import { getHero, type Locale } from "@/lib/cms";
import Hero from "./Hero";

export default async function HeroServer({ locale }: { locale: Locale }) {
    const data = await getHero(locale);
    return (
        <Hero
            background={data.background}
            dots={data.dots}
            title={data.title}
            subtitle={data.subtitle}
            footerText={data.footerText}
            workhours={data.workhours}
        />
    );
}
