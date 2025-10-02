// src/app/[locale]/hakkimizda/basari-oranlari/page.tsx
import { Locale, getOurSuccessRates } from "@/lib/cms";
import SuccessRates from "@/components/ui/SuccessRates";

export default async function Page({ params }: { params: { locale: Locale } }) {
    const data = await getOurSuccessRates(params.locale, "hakkimizda/basari-oranlari");
    return <SuccessRates data={data} />;
}
