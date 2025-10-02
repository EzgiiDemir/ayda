// src/app/[locale]/tedaviler/embriyodonasyonu/page.tsx
import { Locale, getTreatment } from "@/lib/cms";
import TreatmentDetail from "@/components/ui/TreatmentDetail";

export default async function Page({ params }: { params: { locale: Locale } }) {
    const data = await getTreatment(params.locale, "tedaviler/embriyodonasyonu");
    return <TreatmentDetail data={data} />;
}
