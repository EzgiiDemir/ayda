import { getHome } from "@/lib/cms";
import Hero from "@/components/Hero";
import Container from "@/components/ui/Container";
import SectionHeading from "@/components/SectionHeading";
import TreatmentGrid from "@/components/TreatmentGrid";

export default async function Home({ params }: { params: Promise<{ locale: "tr" | "en" }> }) {
    const { locale } = await params;
    const data = await getHome(locale);

    return (
        <>
            <Hero title={data.heroTitle} intro={data.intro} />
            <section className="py-12">
                <Container>
                    <SectionHeading>{locale === "tr" ? "Tedavi Yöntemlerimiz" : "Treatments"}</SectionHeading>
                    <TreatmentGrid locale={locale} items={data.featured} />
                </Container>
            </section>
        </>
    );
}
