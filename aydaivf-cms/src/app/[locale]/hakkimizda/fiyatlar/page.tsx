// src/app/[locale]/hakkimizda/fiyatlar/page.tsx
import Prices from "@/components/ui/Prices";
import { getOurPrices, Locale } from "@/lib/cms";

export default async function Page({ params }: { params: { locale: Locale } }) {
    const data = await getOurPrices(params.locale, "hakkimizda/fiyatlar");
    return <Prices data={data} />;
}
